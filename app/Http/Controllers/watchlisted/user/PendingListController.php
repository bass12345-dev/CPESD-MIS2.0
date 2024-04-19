<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class PendingListController extends Controller
{
    private $person_table = 'persons';
    private $records_table = "records";
    public function index(){

        $data['title']          = 'Pending List';
        return view('watchlisted.users.contents.pending_list.pending')->with($data);
    }

    public function get_pending_list(){

        $items       = CustomModel::q_get_where_order($this->person_table,array('added_by' => session('watch_id'),'status'=>'not-approved'),'created_at','desc')->get();
        $i = 1;
        $data = [];
        foreach ($items as $row) {
            $data[] = array(
                        'name'              => $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension,
                        'age'               => $row->age,
                        'address'           => $row->address,
                        'email'             => $row->email_address,
                        'phone_number'      => $row->phone_number,
                        'number'            => $i++,
                        'person_id'         => $row->person_id
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
