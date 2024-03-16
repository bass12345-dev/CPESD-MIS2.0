<?php

namespace App\Http\Controllers\dts\receiver;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dts\user\MyDocumentsController;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class ReceivedController extends Controller
{
    public  $users_table                    = "users";
    public  $final_actions_table            = "final_actions";
    public function index(){
        $data['title']                      = 'Received Documents';
        $user                               = DB::table('users')->where('user_id', session('_id'))->get()[0];
        $data['user_data']                  = array('user_id' => session('_id'), 'office_id' => $user->off_id );
        $data['received_documents']         = $this->get_received_documents();
        $data['users']                      = $this->get_users();
        $data['final_actions']              = $this->get_final_actions();
        return view('dts.receiver.contents.received.received')->with($data);
    }

    function get_receiver(){
        $items = CustomModel::q_get_where($this->users_table,array('user_status' => 'active','is_receiver' => 'yes'))->first();
        return $items->user_id;
    }

    public function get_users(){

        $items = CustomModel::q_get_where($this->users_table,array('status' => 'active'));
        return $items;

    }

        //GET
    public function get_final_actions(){

        $items = CustomModel::q_get($this->final_actions_table)->get();
        
        $data = [];
        foreach ($items as $row) {

            $data[] = array(


                    'type_name' => $row->action_name,
                    'type_id'   => $row->action_id,
                    'created'   => date('M d Y - h:i a', strtotime($row->created))
            );
            // code...
        }

      return $data;

       


       

    }


    public function get_received_documents(){


        $data = [];

        $rows = DocumentsModel::get_receiver_received_documents();

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


    public function complete(Request $request){
        
        $id    = $request->input('id');
        $tracking_number    = $request->input('t_number');

        $update_receive     = DB::table('history')
                    ->where('history.history_id', $id)
                    ->update(array('status' => 'completed','final_action_taken' => $request->input('final_action_taken'), 'remarks' => $request->input('remarks1') ));

         if($update_receive) {

            $update_receive     = DB::table('documents')
                    ->where('tracking_number', $tracking_number)
                    ->update(array('doc_status' => 'completed','completed_on'=> Carbon::now()->format('Y-m-d H:i:s')));


            $data = array('message' => 'Completed Succesfully' , 'response' => true );
                

        }else {

            $data = array('message' => 'Something Wrong' , 'response' => false );

        }

        return response()->json($data);
        
    }
}
