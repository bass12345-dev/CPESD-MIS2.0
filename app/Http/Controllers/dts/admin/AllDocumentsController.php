<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\DocumentServices;

class AllDocumentsController extends Controller
{
    private $document_type_table     = "document_types";
    private $history_table           = "history";
    private $documents_table         = "documents";
    private $final_actions_table     = "final_actions";
    private $outgoing_table          = 'outgoing_documents';
    protected $DocumentService;
    public $now;
    public function __construct(DocumentServices $DocumentService)
    {
        $this->DocumentService = $DocumentService;
        $this->now = new \DateTime();   
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {


        $data['title']              = 'All Documents';
        $data['document_types']     = CustomModel::q_get($this->document_type_table)->get();
        $user                       = DB::table('users')->where('user_id', session('_id'))->get()[0];
        $data['user_data']          = array('user_id' => session('_id'), 'office_id' => $user->off_id);
        $data['final_actions']      = $this->get_final_actions();
        $data['current']            = Carbon::now()->year.'-'.Carbon::now()->month;
        $row_documents              = null;
        $row_documents = $this->get_all_documents($start_date="",$end_date="",$type_id="",$status1="");
        $data['documents']      = $row_documents;
        return view('dts.admin.contents.all_documents.all_documents')->with($data);
       
    }


    public function get_all_documents()
    {
        $data = $this->DocumentService->get_all_documents();
        return response()->json($data);
    }


    public function delete(Request $request)
    {

        $id = $request->input('id')['id'];
        if (is_array($id)) {
            foreach ($id as $row) {
                $delete                   = CustomModel::q_get_where($this->documents_table, array('document_id' => $row));
                $tracking_number          = $delete->first()->tracking_number;
                $document_id =              $delete->first()->document_id;
                $delete->delete();
                ActionLogsController::dts_add_action($action = 'Deleted Document No. '.$tracking_number,$user_type='user',$_id = $document_id);
                CustomModel::delete_item($this->history_table, array('t_number' => $tracking_number));
                CustomModel::delete_item($this->outgoing_table, array('doc_id' => $document_id));
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


    public function cancel_documents(Request $request)
    {
        $id = $request->input('id')['id'];
        $message = '';
        $arr = array();
        if (is_array($id)) {
            foreach ($id as $row) {
                $items = array(
                    'doc_status'         => 'cancelled',
                );

                $check = CustomModel::q_get_where($this->documents_table,array('document_id' => $row))->first();
                if($check->doc_status != 'completed'){
                    $update = CustomModel::update_item($this->documents_table, array('document_id' => $row), $items);
                    ActionLogsController::dts_add_action($action = 'Canceled Document No. '.$check->tracking_number,$user_type='admin',$_id = $row);
                }else {
                    array_push($arr, $check->document_id);
                }
                
                
            }
            
            $message = count($arr) > 0 ? " Canceled Successfully | Some documents is cannot be cancelled because it's already completed or canceled already" : 'Canceled Succesfully';
            

            $data = array('message' => $message, 'response' => true);
        } else {
            $data = array('message' => 'Error', 'response' => false);
        }



        return response()->json($data);
    }

    public function revert_document(Request $request){

        $tracking_number = $request->input('t');
        $items = array(
            'doc_status'         => 'pending',
        );
        $update = CustomModel::update_item($this->documents_table, array('tracking_number' => $tracking_number), $items);
        if ($update) {
            $query_row = CustomModel::q_get_where($this->documents_table,array('tracking_number' => $tracking_number))->first();
            ActionLogsController::dts_add_action($action = 'Reverted Document No. '.$query_row->tracking_number,$user_type='admin',$_id = $query_row->document_id);
            $update = CustomModel::update_item($this->documents_table, array('document_id' => $query_row->document_id), $items);
            $data = array('message' => 'Reverted Succesfully', 'response' => true);
        } else {

            $data = array('message' => 'Something Wrong/No Changes Apply ', 'response' => false);
        }
        return response()->json($data);

    }


    public function complete(Request $request)
    {

        $id                 = $request->input('id');
        $tracking_number    = $request->input('t_number');
        $hs                 = CustomModel::q_get_where_order($this->history_table,array('history_id' => $id),'history_id','desc')->first();
        $user_row           = CustomModel::q_get_where('users', array('user_type' => 'admin'))->first();


        $where              = array('history_id' => $id);
        $data               = array(
                            // 'user2'             => $hs->user2 == NULL ? $user_row->user_id : $hs->user2,
                            // 'office2'           => $hs->office2 == NULL ? $user_row->off_id : $hs->office2,
                            'status'            => 'received',
                            'received_status'   => 1,
                            'received_date'     =>  $hs->received_date == NULL ?   Carbon::now()->format('Y-m-d H:i:s') : $hs->received_date,
                            'release_status'    => 1,
                            'release_date'      =>  $hs->release_date == NULL ?   Carbon::now()->format('Y-m-d H:i:s')  : $hs->release_date,
        );
        $update             = CustomModel::update_item($this->history_table,$where,$data);

        if($update){

           

        $info = array(
            't_number'              => $tracking_number,
            'user1'                 => $user_row->user_id,
            'office1'               => $user_row->off_id,
            'user2'                 => $user_row->user_id,
            'office2'               => $user_row->off_id,
            'received_status'       => 1,
            'received_date'         => Carbon::now()->format('Y-m-d H:i:s') ,
            'release_status'        => NULL,
            'to_receiver'           => 'no',
            'release_date'          => Carbon::now()->format('Y-m-d H:i:s') ,
            'status'                => 'completed',
            'final_action_taken'    => $request->input('final_action_taken'),
            'remarks'               => $request->input('remarks1')

        );

        $add1 = CustomModel::insert_item($this->history_table, $info);

        if ($add1) {
            $query_row = CustomModel::q_get_where($this->documents_table,array('tracking_number'=> $tracking_number))->first();
            $update_receive = DB::table('documents')
                ->where('tracking_number', $tracking_number)
                ->update(array('doc_status' => 'completed','completed_on'=> Carbon::now()->format('Y-m-d H:i:s')));
            
            ActionLogsController::dts_add_action($action = 'Completed Document No. '.$query_row->tracking_number,$user_type='user',$_id = $query_row->document_id);
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
