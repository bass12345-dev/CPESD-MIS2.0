<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DashboardController extends Controller
{

    public $documents_table = "documents";
    public $history_table = "history";
    public function index(){
        $data['title'] = 'User Dashboard';
        $data['count'] = $this->countmydoc_dash();
        $data['today'] = Carbon::now()->format('M d Y');
        return view('dts.users.contents.dashboard.dashboard')->with($data);
       
    }

    public function countmydoc_dash(){

        $id = session('_id');
        $date_now = Carbon::now()->format('Y-m-d');
        $data = array(

                'count_documents'   => CustomModel::q_get_where($this->documents_table,array('u_id' => $id))->count(),
                'incoming'          => CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => NULL,'status' => 'torec','release_status' => NULL,'to_receiver'=> 'no'))->count(),
                'received'          =>  CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => 1,'status' => 'received','release_status' => NULL,'to_receiver'=> 'no'))->count(),           
                'forwarded'         => CustomModel::q_get_where($this->history_table,array('user1' => $id,'received_status' => NULL,'status' => 'torec','release_status' => NULL))->count(),
                'pending'           => CustomModel::q_get_where($this->documents_table,array('doc_status' => 'pending','u_id'=> session('_id')))->count(),
                'completed'         => CustomModel::q_get_where($this->documents_table,array('doc_status' => 'completed','u_id'=> session('_id')))->count(),
                'cancelled'         => CustomModel::q_get_where($this->documents_table,array('doc_status' => 'cancelled','u_id'=> session('_id')))->count(),
                'added_today'         => DocumentsModel::user_added_document_date_now($date_now)
        );

        return $data;
    }
}
