<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllDocumentsController extends Controller
{
    public $document_type_table = "document_types";
    public $history_table = "history";
    public $documents_table = "documents";
    public $final_actions_table = "final_actions";
    public function index()
    {


        $data['title'] = 'All Documents';
        $data['document_types'] = CustomModel::q_get($this->document_type_table);
        $data['documents'] = $this->get_all_documents();
        $user = DB::table('users')->where('user_id', session('_id'))->get()[0];
        $data['user_data'] = array('user_id' => session('_id'), 'office_id' => $user->off_id);
        $data['final_actions'] = $this->get_final_actions();
        return view('dts.admin.contents.all_documents.all_documents')->with($data);
    }

    public function get_all_documents()
    {

        $rows = DocumentsModel::get_all_documents();
        $data = [];
        $i = 1;

        foreach ($rows as $value => $key) {
            $where = array('t_number' => $key->tracking_number);
            $delete_button = CustomModel::q_get_where($this->history_table, $where)->count() > 1 ? true : false;
            $status = $key->doc_status == 'completed' ? 'Completed' : 'Pending';
            $history = CustomModel::q_get_where_order($this->history_table, $where, 'history_id', 'desc')->get()[0];


            $data[] = array(
                'number' => $i++,
                'tracking_number' => $key->tracking_number,
                'document_name' => $key->document_name,
                'type_name' => $key->type_name,
                'created' => $key->created,
                'a' => $delete_button,
                'document_id' => $key->document_id,
                'history_id' => $history->history_id,
                'user_id' => $key->u_id,
                'created_by' => $key->first_name . ' ' . $key->middle_name . ' ' . $key->last_name . ' ' . $key->extension,
                'is' => $status,
                'history_status' => $key->doc_status
            );
        }


        return $data;

    }


    public function delete(Request $request)
    {

        $id = $request->input('id')['id'];


        if (is_array($id)) {
            foreach ($id as $row) {
                $delete = CustomModel::q_get_where($this->documents_table, array('document_id' => $row));
                $tracking_number = $delete->get()[0]->tracking_number;
                $delete->delete();
                CustomModel::delete_item($this->history_table, array('t_number' => $tracking_number));
            }

            $data = array('message' => 'Deleted Succesfully', 'response' => true);
        } else {
            $data = array('message' => 'Error', 'response' => false);
        }



        return response()->json($data);
    }

    //GET
    public function get_final_actions()
    {

        $items = CustomModel::q_get($this->final_actions_table)->get();

        $data = [];
        foreach ($items as $row) {

            $data[] = array(


                'type_name' => $row->action_name,
                'type_id' => $row->action_id,
                'created' => date('M d Y - h:i a', strtotime($row->created))
            );
            // code...
        }

        return $data;






    }


    public function complete(Request $request)
    {

        $id = $request->input('id');
        $tracking_number = $request->input('t_number');


        $where      = array('history_id' => $id);
        $data       = array('status' => 'to-complete');
        $update     = CustomModel::update_item($this->history_table,$where,$data);

        if($update){

            $user_row = CustomModel::q_get_where('users', array('user_type' => 'admin'))->first();

        $info = array(
            't_number' => $tracking_number,
            'user1' => $user_row->user_id,
            'office1' => $user_row->off_id,
            'user2' => $user_row->user_id,
            'office2' => $user_row->off_id,
            'received_status' => 1,
            'received_date' => date('Y-m-d H:i:s', time()),
            'release_status' => NULL,
            'to_receiver' => 'no',
            'release_date' => NULL,
            'status' => 'completed',
            'final_action_taken' => $request->input('final_action_taken'),
            'remarks' => $request->input('remarks1')

        );

        $add1 = CustomModel::insert_item($this->history_table, $info);

        if ($add1) {

            $update_receive = DB::table('documents')
                ->where('tracking_number', $tracking_number)
                ->update(array('doc_status' => 'completed'));

            $data = array('message' => 'Completed Succesfully', 'response' => true);
        } else {

            $data = array('message' => 'Something Wrong', 'response' => false);

        }

        }else {
            $data = array('message' => 'Something Wrong', 'response' => false);
        }


        
        

        return response()->json($data);


    }

}
