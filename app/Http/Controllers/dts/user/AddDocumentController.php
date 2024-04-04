<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddDocumentController extends Controller
{
    private $document_types_table = "document_types";
    private $user_table = "users";
    private $office_table = "offices";
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
        $current_year = Carbon::now()->format('Y');
        

        if($verify) {

            $last_created = date('Y', strtotime( DB::table('documents')->orderBy('created', 'desc')->get()[0]->created));

            if($current_year > $last_created )
                {      
                     $l = Carbon::now()->format('Ymd').'001';

                }else if ($current_year < $last_created) {

                    $l = DB::table('documents')->whereRaw("YEAR(documents.created) = '".Carbon::now()->format('Y-m-d')."' ")->orderBy('created', 'desc')->get()[0]->tracking_number +  1;
                   
                    
                }else if (Carbon::now()->format('Y') === $last_created){

                    //$x = DB::table('documents')->whereRaw("YEAR(documents.created) = '".Carbon::now()->format('Y')."' ")->orderBy('created', 'desc')->get()[0]->tracking_number +  1;
                    $x = Carbon::now()->format('Ymd').$this->last_three_digits() + 1;
                    $l = $this->put_zeros($x);
                   
                }
        }else {

            $l = Carbon::now()->format('Ymd').'001';

        }

    

        return $l;
        // response()->json((array('number'=> $l,'y'=> date('Y', time()), 'm' => date('m', time()), 'd' => date('d', time()) )));
    }


    function last_three_digits() { 

        $number = DB::table('documents')->whereRaw("YEAR(documents.created) = '".Carbon::now()->format('Y')."' ")->orderBy('created', 'desc')->get()[0]->tracking_number;
        $arr = str_split((string)$number); 
          
        $lastThirdDigit = $arr[sizeof($arr)-3]; 
        $lastSecondDigit = $arr[sizeof($arr)-2]; 
        $lastDigit = $arr[sizeof($arr)-1]; 

        return $lastThirdDigit.$lastSecondDigit.$lastDigit;
        
    } 

    function l($l){

        $x = $this->addOne();
        $l = $this->put_zeros($x);

        return $l;

    }

    function addOne(){

        return DB::table('documents')->whereRaw("YEAR(documents.created) = '".Carbon::now()->format('Y')."' ")->get()[0]->tracking_number +  1;

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
