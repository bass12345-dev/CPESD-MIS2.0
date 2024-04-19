<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
class RestoreListController extends Controller
{
    private $person_table = 'persons';
    private $records_table = "records";
    public function index(){
        $data['title'] = 'Restore';
        return view('watchlisted.admin.contents.restore.restore')->with($data);
    }

    public function remove_from_watchlisted(){

        $items = CustomModel::q_get_where_order($this->person_table,array('status' => 'inactive'),'first_name','asc')->get();
        $i = 1;
        $data = [];
        foreach ($items as $row) {
            $data[] = array(
                        'name'              => $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension,
                        'age'               => $row->age,
                        'address'           => $row->address,
                        'email'             => $row->email_address,
                        'phone_number'      => $row->phone_number,
                        'person_id'         => $row->person_id,
                        'number'            => $i++
            );
           
        }
        return response()->json($data);

    }

    public function delete(Request $request){
        $id = $request->input('id')['id'];
        if (is_array($id)) {
            foreach ($id as $row) {
            $delete = CustomModel::delete_item($this->person_table,array('person_id' => $row));  
            if($delete) {
                CustomModel::delete_item($this->records_table,array('p_id' => $row));  
                }
            }
            $data = array('message' => 'Deleted Succesfully' , 'response' => true);
        }else{
             $data = array('message' => 'Error' , 'response' => false );
        }

        return response()->json($data);
    }


}
