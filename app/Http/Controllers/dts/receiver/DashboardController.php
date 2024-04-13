<?php

namespace App\Http\Controllers\dts\receiver;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dts\admin\AllDocumentsController;
use App\Http\Controllers\dts\user\MyDocumentsController;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use App\Models\DocumentsModel;
use Carbon\Carbon;

class DashboardController extends Controller
{    
    private  $history_table        = "history";
    private  $documents_table      = 'documents';
    public function index(){
        $data['title'] = 'Receiver Dashboard';
        $data['count'] = $this->countmydoc_dash();
        $data['today'] = Carbon::now()->format('M d Y');
        return view('dts.receiver.contents.dashboard.dashboard')->with($data);
    }

    public function countmydoc_dash(){

        $id = session('_id');
        $date_now = Carbon::now()->format('Y-m-d');
        $data = array(
                'count_documents'    => CustomModel::q_get($this->documents_table)->count(),
                'incoming'          => CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => NULL, 'status' => 'torec', 'release_status' => NULL, 'to_receiver' => 'yes'))->count(),
                'received'          => CustomModel::q_get_where($this->history_table,array('user2' => $id,'received_status' => 1, 'status' => 'received', 'release_status' => NULL, 'to_receiver' => 'yes'))->count(),
                'added_today'           => DocumentsModel::added_document_date_now($date_now),
                'completed_today'       => DocumentsModel::completed_document_date_now($date_now),
                'latest'                => DocumentsModel::get_all_documents_with_limit_completed('10')
    
        );

        return $data;
    }

}
