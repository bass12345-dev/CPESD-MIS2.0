<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use App\Models\CustomModel;
use App\Http\Controllers\dts\admin\ActionLogsController;

class ReceivedController extends Controller
{   
    private $user_table = "users";
    private  $history_table        = "history";
    private  $documents_table      = 'documents';
    public function index(){
        $data['title']              = 'Received Documents';
        $data['user_data']          = CustomModel::q_get_where($this->user_table,array('user_id' => session('_id')))->first();
        $data['received_documents'] = $this->get_received_documents();
        $data['users']              = CustomModel::q_get_where($this->user_table,array('user_status' => 'active'))->get();
        return view('dts.users.contents.received.received')->with($data);
    }


    public function get_received_documents(){


        $data = [];

       $rows = DocumentsModel::get_received_documents();

       foreach ($rows as $value => $key) {

         
            $data[] = array(

                    'tracking_number'   => $key->tracking_number,
                    't_'                => $key->tracking_number,
                    'document_name'     => $key->document_name,
                    'type_name'         => $key->type_name,
                    'received_date'     => date('M d Y - h:i a', strtotime($key->received_date)) ,
                    'history_id'        => $key->history_id,
                    'document_id'       => $key->document_id,
                    'a'                 => $key->user_type == 'admin' ? false : true,
                    'remarks'           => $key->remarks,
            );
        }

        return $data;


    }

    public function received_error(Request $request){
       
        $history_id = $request->input('history_id');
        $tracking_number = $request->input('tracking_number');
        $resp = $this->received_error_process($history_id,$tracking_number);
        return response()->json($resp);

    }

    public function received_errors(Request $request){
        
        $items = $request->input('id')['items'];

        if (is_array($items)) {

            foreach ($items as $row) {

                $x = explode('-', $row);

                $history_id = $x[0];
                $tracking_number = $x[1];
                $resp = $this->received_error_process($history_id,$tracking_number);

            }
        }
        return response()->json($resp);
    }

    public function outgoing_documents(Request $request){

        $items = $request->input('history_track2');
        $note  = $request->input('note');
        $array      = explode(',',$items);

        foreach ($array as $row) {

            $x                  = explode('-', $row);
            $history_id         = $x[0];
            $tracking_number    = $x[1];
            $r                  = CustomModel::q_get_where($this->documents_table, array('tracking_number' => $tracking_number))->first();
            if ($r->doc_status != 'cancelled') {
                $info = array(
                            'doc_status' => 'outgoing',
                            'note'       => $note
                );
                $where = array('tracking_number' => $tracking_number);
                $update_outgoing = CustomModel::update_item($this->documents_table,$where,$info);
                ActionLogsController::dts_add_action($action = 'Outgoing Document No. '.$r->tracking_number,$user_type='user',$_id = $r->document_id);
                $data = array('message' => 'Completed Succesfully', 'response' => true);

            }else {
                $data = array('message' => 'This Document is cancelled', 'response' => false);
            }
           
        }
        return response()->json($data);
    }



    private function received_error_process($history_id,$tracking_number){
        $items  = array(

            'status'            => 'torec',
            'received_status'   => NULL,
            'received_date'     => NULL
        );

        
        $r = CustomModel::q_get_where('documents',array('tracking_number'=> $tracking_number))->first(); 
        if ($r->doc_status != 'cancelled') {

            $update_receive = CustomModel::update_item($this->history_table, array('history_id' => $history_id), $items);
            if ($update_receive) {
                ActionLogsController::dts_add_action($action = 'Received Error Document No. '.$tracking_number,$user_type='user',$_id = $r->document_id);
                $data = array('message' => 'Success','id'=>$history_id,'tracking_number' => $tracking_number, 'response' => true);
            } else {
                $data = array('message' => 'Something Wrong', 'response' => false);
            }
        } else {
            $data = array('message' => 'This Document is cancelled', 'response' => false);
        }

        return $data;
    }
}
