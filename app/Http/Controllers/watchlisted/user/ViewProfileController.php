<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\PersonModel;
use App\Http\Controllers\dts\admin\ActionLogsController;


class ViewProfileController extends Controller
{
    private $person_table            = 'persons';
    private $programs_table          = 'programs';
    private $programs_block_table    = 'program_block';
    private $records_table           = 'records';
    private $user_table              = 'users';
    public function index(){

        $id = $_GET['id'];
        $data['title']              = 'View Profile';
        $data['person_data']        = PersonModel::get_person_profile($id);
        $data['programs']           = $this->get_programs();
        $data['person_programs']    = $this->get_person_programs($data['programs']);   
        $data['barangay']           = config('app.barangay');
        return view('watchlisted.users.contents.view_profile.view_profile')->with($data);
    }




    public function update_information(Request $request){

        $items = array(

            'first_name'        => $request->input('firstName'),
            'middle_name'       => $request->input('middleName'),
            'last_name'         => $request->input('lastName'),
            'extension'         => $request->input('extension'),
            'phone_number'      => $request->input('phoneNumber'),
            'address'           => $request->input('address'),
            'email_address'     => $request->input('emailAddress'),
            'age'               => $request->input('age'),
            'gender'            => $request->input('gender')
        );

       
        $id = $request->input('person_id');
        $update = CustomModel::update_item($this->person_table, array('person_id' => $id), $items);
        if ($update) {
            $user_row = CustomModel::q_get_where($this->person_table,array('person_id' => $id))->first();
            ActionLogsController::wl_add_action($action = 'Updated "' . $user_row->first_name.' '.$user_row->first_name.' '.$user_row->last_name.'" information', $user_type = 'user', $_id = $user_row->person_id);
            $data = array('message' => 'Updated Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong/Data is not updated', 'response' => false);
        }
        return response()->json($data);

        
    }
    public function change_status(Request $request)
    {
        $request = $request->input('id');
        $id = $request['id'];
        $status = $request['status'];
        $message = $request['status'] == 'active' ? 'Set Successfully' : 'Removed Successfully';
        if (is_array($id)) {
            foreach ($id as $row) {
                $update = CustomModel::update_item($this->person_table, array('person_id' => $row), array('status' => $status));
            }
            $data = array('message' => $message, 'response' => true);
        } else {
            $update = CustomModel::update_item($this->person_table, array('person_id' => $id), array('status' => $status));
            if ($update) {
                $data = array('message' => $message, 'response' => true);
            } else {
                $data = array('message' => 'Something Wrong/Data is not updated', 'response' => false);
            }
        }

        return response()->json($data);

    }


    public function add_record(Request $request)
    {
        $items = array(
            'record_description'    => $request->input('record_description'),
            'p_id'                  => $request->input('person_id'),
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s') ,
        );
        $add = CustomModel::insert_item($this->records_table, $items);
        if ($add) {
            $user_row = CustomModel::q_get_where($this->person_table,array('person_id' => $items['p_id']))->first();
            ActionLogsController::wl_add_action($action =  'Added record of "'. $user_row->first_name.' '.$user_row->first_name.' '.$user_row->last_name.'"', $user_type = 'user', $_id = $user_row->person_id);
            $data = array('message' => 'Added Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong', 'response' => false);
        }
        return response()->json($data);
    }

    public function update_record(Request $request)
    {
        $id = $request->input('record_id');
        $items = array('record_description' => $request->input('record_description'));
        $update = CustomModel::update_item($this->records_table, array('record_id' => $id), $items);
        if ($update) {
            $data = array('message' => 'Updated Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong/No Changes Apply', 'response' => false);
        }
        return response()->json($data);
    }

    public function delete_record(Request $request)
    {
        $id = $request->input('id');
        $delete = CustomModel::delete_item($this->records_table, array('record_id' => $id));
        if ($delete) {
            $data = array('message' => 'Deleted Succesfully', 'response' => true );
        } else {
            $data = array('message' => 'Error', 'response' => false);
        }
        return response()->json($data);
    }

    public function save_record_program(Request $request)
    {
        $ids            = $request->input('id');
        $person_id      = $request->input('person_id');

   
        if (is_array($ids)) {
            CustomModel::delete_item($this->programs_block_table,array('person_id' => $person_id));
            foreach ($ids as $row) {
                $item   = array(

                    'person_id' => $person_id,
                    'program_id' => $row,
                    'created' => Carbon::now()->format('Y-m-d H:i:s') ,
                );
                $add = CustomModel::insert_item($this->programs_block_table,$item);
            }
            $data = array('message' => 'Added Succesfully', 'response' => true);
        } else {
            $delete = CustomModel::delete_item($this->programs_block_table,array('person_id' => $person_id));
            if($delete){
                $data = array('message' => 'Programs Removed Succesfully', 'response' => true);
            }else {
                $data = array('message' => 'Error', 'response' => false);
            }
        }

        return response()->json($data);
    }



    function get_person_programs($data){

        $item = [];

        foreach ($data as $row) {
            
            if ($row['x'] == true) {
                
                array_push($item,$row['program']);
            }
        }

        return $item;

    }

     private function get_programs(){


        $items              = CustomModel::q_get_order($this->programs_table,'program','asc')->get();
        $person_id          = $_GET['id'];

        $data               = [];

        foreach ($items as $row) {

            $program_id     = $row->program_id;

            $x = CustomModel::q_get_where($this->programs_block_table,array('person_id' => $person_id,'program_id' => $program_id))->count();
            $data[]         = array(

                                    'program'       => $row->program,
                                    'program_id'    => $row->program_id,
                                    'x'             => $x == 1 ? true : null
            );
        }


        return $data;


 }


 public function get_records(){

        $data = [];
        $id = $_GET['id'];
        $items = CustomModel::q_get_where($this->records_table,array('p_id' =>$id ))->get();
        $person = PersonModel::get_person_profile($id);
        foreach ($items as $row) {
                
            $data[] = array(

                    'created_at'            => date('M d Y - h:i a', strtotime($row->created_at)),
                    'record_description'    => $row->record_description,
                    'p_id'                  => $row->p_id,
                    'record_id'             => $row->record_id,
                    'actions'               => session('watch_id') == $person->user_id ?  true : false
                    

            );
        }
      return response()->json($data);
    }

}
