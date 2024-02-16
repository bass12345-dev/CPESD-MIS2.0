<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class OfficesController extends Controller
{   
    public $office_table    = "offices";
    public $documents_table = "documents";
    public $history_table   = "history";
    public $now;
    public function __construct()
    {
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {
        $data['title']      = 'Manage Offices';
        $data['offices']    = CustomModel::q_get($this->office_table)->get();
        return view('dts.admin.contents.offices.offices')->with($data);
    }


    public function store(Request $request){

       
        $items = array(
            'office'        => $request->input('office'),
            'office_status' => 'active', 
            'created'       =>  $this->now->format('Y-m-d H:i:s')
        );

        if(!empty($items['office'])) {

            $add = CustomModel::insert_item($this->office_table,$items);

            if ($add) {

                     $data = array('message' => 'Add Successfully' , 'response' => true );

                }else {

                    $data = array('message' => 'Something Wrong' , 'response' => false );


                }

            }else {

                $data = array('message' => 'Empty Field' , 'response' => false );
            }
   
        return response()->json($data);
        
    }

    public function update(Request $request){
        $where      = array('office_id' => $request->input('office_id'));
        $data       = array('office'  => $request->input('office'));
        $update     = CustomModel::update_item($this->office_table,$where,$data);
        if ($update) {
            $data   = array('message' => 'Updated Successfully' , 'response' => true );
       }else {
           $data    = array('message' => 'Something Wrong/No Changes Apply' , 'response' => false );
       }
       return response()->json($data);
    }

    public function delete(Request $request){
        $id         = $request->input('id');
        $check      = CustomModel::q_get_where($this->documents_table,array('offi_id'=>$id))->count();


        if ($check > 0) {
            $data   = array('message' => 'This type of document is used in other operation' , 'response' => false);
       }else {
           $delete  = CustomModel::delete_item($this->office_table,array('office_id' => $id));
           
               if($delete) {
                   $data = array('message' => 'Deleted Succesfully' , 'response' => true );
               }else {
                   $data = array('message' => 'Error', 'response' => false);
               }
       }

       return response()->json($data);
    }
}
