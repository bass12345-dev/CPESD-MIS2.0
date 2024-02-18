<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddDocumentController extends Controller
{
    public $document_types_table = "document_types";
    public $user_table = "users";
    public $office_table = "offices";
    public function index(){
        $data['title']          = 'Add Document';
        $data['document_types'] = CustomModel::q_get_order($this->document_types_table,'type_name','asc')->get(); 
        $data['user_data']      = CustomModel::q_get_where($this->user_table,array('user_id' => session('_id')))->first();
        $data['documents']      = DocumentsModel::get_all_documents_with_limit(10);
        $data['reference_number']  = $this->get_last();
        $data['offices']        = CustomModel::q_get_order($this->office_table,'office','asc')->get(); 
        
        return view('dts.users.contents.add_document.add_document')->with($data);
    }

    public function get_last(){

        $l = '';
        $verify = DB::table('documents')->count();
        if($verify) {

            if(date('Y', time()) > date('Y', strtotime( DB::table('documents')->orderBy('created', 'desc')->get()[0]->created)))
                {      
                     $l = date('Ymd', time()).'001';

                }else if (date('Y', time()) < date('Y', strtotime( DB::table('documents')->orderBy('created', 'desc')->get()[0]->created))) {

                    $l = DB::table('documents')->whereRaw("YEAR(documents.created) = '".date('Y-m-d', time())."' ")->orderBy('created', 'desc')->get()[0]->tracking_number +  1;
                    // $l = $this->put_zeros($x);
                    
                }else if (date('Y', time()) === date('Y', strtotime( DB::table('documents')->orderBy('created', 'desc')->get()[0]->created))){

                    $x = DB::table('documents')->whereRaw("YEAR(documents.created) = '".date('Y', time())."' ")->orderBy('created', 'desc')->get()[0]->tracking_number +  1;
                    $l = $this->put_zeros($x);
                   
                }
        }else {
             $l = date('Ymd', time()).'001';
        }

    

        return $l;
        // response()->json((array('number'=> $l,'y'=> date('Y', time()), 'm' => date('m', time()), 'd' => date('d', time()) )));
    }

    function l($l){

        $x = $this->addOne();
        $l = $this->put_zeros($x);

        return $l;

    }

    function addOne(){

        return DB::table('documents')->whereRaw("YEAR(documents.created) = '".date('Y', time())."' ")->get()[0]->tracking_number +  1;

    }

     function get_created(){

        return date('Y', strtotime( DB::table('documents')->orderBy('created', 'desc')->get()[0]->created));

    }


    function put_zeros($x){

        $l = '';
           if ($x  < 10) {

                        $l = '00'.$x;
                      
                    }else if($x < 100 ) {

                        $l = '0'.$x;
                       

                    }else {


                         $l = $x;
                        
                    }

                    return $l;

    }
}
