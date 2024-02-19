<?php

namespace App\Http\Controllers\dts\receiver;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dts\admin\AllDocumentsController;
use App\Http\Controllers\dts\user\MyDocumentsController;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{    
    public  $history_table        = "history";
    public  $documents_table      = 'documents';
    public function index(){
        $data['title'] = 'Receiver Dashboard';
        $data['count'] = $this->countmydoc_dash();
        return view('dts.receiver.contents.dashboard.dashboard')->with($data);
    }

    public function countmydoc_dash(){

        $id = session('_id');
        $data = array(
                'count_documents'    => CustomModel::q_get($this->documents_table)->count(),
                'incoming'          => CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => NULL, 'status' => 'torec', 'release_status' => NULL, 'to_receiver' => 'yes'))->count(),
                'received'          => CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => 1, 'status' => 'received', 'release_status' => NULL, 'to_receiver' => 'yes'))->count(),
        );

        return $data;
    }

}
