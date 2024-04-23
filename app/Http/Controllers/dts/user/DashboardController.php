<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DashboardController extends Controller
{

    private $documents_table = "documents";
    private $history_table = "history";
    private $outgoing_table             = 'outgoing_documents';
    private $users_table             = "users";

    public function index(){
        $data['title'] = 'User Dashboard';
        $data['count'] = $this->countmydoc_dash();
        $data['today'] = Carbon::now()->format('M d Y');
        $data['forwarded_to_users'] = $this->get_forwarded_documents();
        return view('dts.users.contents.dashboard.dashboard')->with($data);
       
    }

    public function countmydoc_dash(){

        $id = session('_id');
        $date_now = Carbon::now()->format('Y-m-d');
        $received = CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => 1,'status' => 'received','release_status' => NULL,'to_receiver'=> 'no'))->count();
        $outgoing = CustomModel::q_get_where($this->outgoing_table,array('status' => 'pending','user_id'=> $id))->count();

        $data = array(

                'count_documents'   => CustomModel::q_get_where($this->documents_table,array('u_id' => $id))->count(),
                'incoming'          => CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => NULL,'status' => 'torec','release_status' => NULL,'to_receiver'=> 'no'))->count(),
                'received'          =>  $received - $outgoing,
                'forwarded'         => CustomModel::q_get_where($this->history_table,array('user1' => $id,'received_status' => NULL,'status' => 'torec','release_status' => NULL))->count(),
                'pending'           => CustomModel::q_get_where($this->documents_table,array('doc_status' => 'pending','u_id'=> $id))->count(),
                'completed'         => CustomModel::q_get_where($this->documents_table,array('doc_status' => 'completed','u_id'=> $id))->count(),
                'cancelled'         => CustomModel::q_get_where($this->documents_table,array('doc_status' => 'cancelled','u_id'=> $id))->count(),
                'encoded_outgoing'   => CustomModel::q_get_where($this->documents_table,array('doc_status' => 'outgoing','u_id'=> $id))->count(),
                'outgoing'          => $outgoing,
                'added_today'         => DocumentsModel::added_document_date_now($date_now),
                // DocumentsModel::user_added_document_date_now($date_now)
        );

        return $data;
    }



    function get_forwarded_documents(){
        //get users
        $users = CustomModel::q_get_where($this->users_table,array('user_status'=>'active'))->get();
        //store results
        $result = array();
        foreach($users as $row){
            $query_history =  DocumentsModel::count_forwarded_documents($row->user_id);
            if($query_history->count() > 0){
                array_push($result,$row->first_name.' - '.$query_history->count().' Document/s');
            }
            $query_history1 =  DocumentsModel::count_forwarded_documents_final($row->user_id);
            if($query_history1->count() > 0){
                array_push($result,'Final Receiver'.' - '.$query_history1->count().' Document/s');
            }
            

        }

        return $result;
    }
}
