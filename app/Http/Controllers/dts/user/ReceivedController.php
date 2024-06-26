<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use App\Models\CustomModel;
use Carbon\Carbon;
use App\Http\Controllers\dts\admin\ActionLogsController;

class ReceivedController extends Controller
{   
    private $user_table             = "users";
    private  $history_table         = "history";
    private  $documents_table       = 'documents';
    private $office_table           = "offices";
    private $outgoing_table         = 'outgoing_documents';
    private $final_actions_table     = "final_actions";

    public function index(){
        $data['title']              = 'Received Documents';
        $data['user_data']          = CustomModel::q_get_where($this->user_table,array('user_id' => session('_id')))->first();
        $data['users']              = CustomModel::q_get_where($this->user_table,array('user_status' => 'active'))->get();
        $data['offices']            = CustomModel::q_get_order($this->office_table,'office','asc')->get(); 
        $data['final_actions']      = $this->get_final_actions();
        return view('dts.users.contents.received.received')->with($data);
    }


    public function get_received_documents(){


       $data = [];
       $rows = DocumentsModel::get_received_documents();
       $i = 1;
       foreach ($rows as $value => $key) {

         
            $data[] = array(
                    'his_tn'            => $key->history_id.'-'.$key->tracking_number,
                    'tracking_number'   => $key->tracking_number,
                    't_'                => $key->tracking_number,
                    'document_name'     => $key->document_name,
                    'type_name'         => $key->type_name,
                    'received_date'     => date('M d Y - h:i a', strtotime($key->received_date)) ,
                    'history_id'        => $key->history_id,
                    'document_id'       => $key->document_id,
                    'a'                 => $key->user_type == 'admin' ? false : true,
                    'remarks'           => $key->remarks,
                    'number'            => $i++
            );
        }

       return response()->json($data);

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

        $items          = $request->input('history_track2');
        $note           = $request->input('note');
        $office         = $request->input('office');
        $array          = explode(',',$items);


   

        foreach ($array as $row) {

            $x                  = explode('-', $row);
            $history_id         = $x[0];
            $tracking_number    = $x[1];
            $r                  = CustomModel::q_get_where($this->documents_table, array('tracking_number' => $tracking_number))->first();
            if ($r->doc_status != 'cancelled') {
                $info = array(
                            'doc_status' => 'outgoing',
                );
                $add_items = array(
                            'doc_id'        => $r->document_id,
                            'user_Id'       => session('_id'),
                            'off_id'        => $office,
                            'remarks'       => $note,
                            'status'        => 'pending',
                            'outgoing_date' => Carbon::now()->format('Y-m-d H:i:s'), 
                );
                // $history_info = array('status' => 'outgoing');
                $where = array('tracking_number' => $tracking_number);
                // $where2 = array('history_id' => $history_id);
                $add_outgoing = CustomModel::insert_item($this->outgoing_table,$add_items);
                $update_outgoing = CustomModel::update_item($this->documents_table,$where,$info);
                // $history_outgoing = CustomModel::update_item($this->history_table,$where2,$history_info);
                ActionLogsController::dts_add_action($action = 'Outgoing Document No. '.$r->tracking_number,$user_type='user',$_id = $r->document_id);
                $data = array('message' => 'Updated Succesfully', 'response' => true);

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
    
}
