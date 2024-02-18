<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public $documents_table = "documents";
    public $history_table = "history";
    public function index(){
        $data['title'] = 'User Dashboard';
        $data['count'] = $this->countmydoc_dash();
        return view('dts.users.contents.dashboard.dashboard')->with($data);
    }

    public function countmydoc_dash(){

        $id = session('_id');
        $data = array(

                'count_documents'    => CustomModel::q_get_where($this->documents_table,array('u_id' => $id))->count(),
                'incoming'          => CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => NULL,'status' => 'torec','release_status' => NULL,'to_receiver'=> 'no'))->count(),
                'received'          =>  CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => 1,'status' => 'received','release_status' => NULL,'to_receiver'=> 'no'))->count(),           
                'forwarded'         => CustomModel::q_get_where($this->history_table,array('user1' => $id,'received_status' => NULL,'status' => 'torec','release_status' => NULL))->count(),

        );

        return $data;
    }
}
