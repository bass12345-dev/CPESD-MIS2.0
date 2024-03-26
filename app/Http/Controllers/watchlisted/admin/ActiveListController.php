<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActiveListController extends Controller
{
    public $person_table            = 'persons';
    public $records_table           = 'records';

    public $programs_block_table    = 'program_block';
    public $now;
    public function __construct()
    {
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {
        $data['title'] = 'List';
        $data['list'] = CustomModel::q_get_where_order($this->person_table, array('status' => 'active'), 'first_name', 'asc')->get();
        return view('watchlisted.admin.contents.list.list')->with($data);
    }

    public function store(Request $request)
    {

        $items = array(

            'first_name'                => $request->input('firstName'),
            'middle_name'               => $request->input('middleName'),
            'last_name'                 => $request->input('lastName'),
            'extension'                 => $request->input('extension'),
            'phone_number'              => $request->input('phoneNumber'),
            'address'                   => $request->input('address'),
            'email_address'             => $request->input('emailAddress'),
            'created_at'                => Carbon::now()->format('Y-m-d H:i:s') ,
            'status'                    => 'active',
            'age'                       => $request->input('age'),
            'gender'                    => $request->input('gender'),
            'added_by'                  => session('watch_id')
        );
        $add = CustomModel::insert_item($this->person_table, $items);
        if ($add) {
            $data = array('id' => DB::getPdo()->lastInsertId(), 'message' => 'Added Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong', 'response' => false);
        }
        return response()->json($data);

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
            'gender'            => $request->input('gender'),
        );
        $id = $request->input('person_id');
        $update = CustomModel::update_item($this->person_table, array('person_id' => $id), $items);
        if ($update) {
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
            $data = array('message' => 'Deleted Succesfully', 'response' => 'true ');
        } else {
            $data = array('message' => 'Error', 'response' => 'false');
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
}
