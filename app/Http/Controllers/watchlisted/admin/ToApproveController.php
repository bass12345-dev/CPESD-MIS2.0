<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;
use App\Models\PersonModel;
use App\Http\Controllers\dts\admin\ActionLogsController;

class ToApproveController extends Controller
{
    private $person_table   = 'persons';
    private $records_table  = 'records';
    public function index(){

        $data['title'] = 'To Approve';
        return view('watchlisted.admin.contents.to_approve.to_approve')->with($data);
    }


    public function to_approved_watchlist(){

        $items       = PersonModel::get_to_approve();
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
                        'encoded_by'        => $row->user_first_name.' '.$row->user_middle_name.' '.$row->user_last_name.' '.$row->user_extension,
                        'number'            => $i++
            );
           
        }
        return response()->json($data);
    }

    public function approve(Request $request){

        $id = $request->input('id')['id'];
        if (is_array($id)) {
            foreach ($id as $row) {
                
                $update = CustomModel::update_item($this->person_table, array('person_id' => $row), array('status'=> 'active'));
                $user_row = CustomModel::q_get_where($this->person_table,array('person_id' => $row))->first();
                ActionLogsController::wl_add_action($action = 'Approved New Watchlisted | ' . $user_row->first_name.' '.$user_row->first_name.' '.$user_row->last_name, $user_type = 'user', $_id = $user_row->person_id);
            }
            $data = array('message' => 'Approved Succesfully' , 'response' => true);
        }else{
             $data = array('message' => 'Error' , 'response' => false );
        }

        return response()->json($data);


    }
}
