<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use App\Models\DocumentsModel;
use Carbon\Carbon;
class DashboardController extends Controller
{   
    public $document_table          = "documents";
    public $office_table            = "offices";
    public $document_types_table    = "document_types";
    public $users_table             = "users";
    public $final_actions_table = "final_actions";
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['count'] = $this->count_menu_data();
        $data['today'] = Carbon::now()->format('M d Y');
        return view('dts.admin.contents.dashboard.dashboard')->with($data);
    }

    public function count_menu_data()
    {
        $date_now = Carbon::now()->format('Y-m-d');
        $data = array(

            'count_documents'       => CustomModel::q_get($this->document_table)->count(),
            'count_offices'         => CustomModel::q_get_where($this->office_table,array('office_status' => 'active'))->count(),
            'count_document_types'  => CustomModel::q_get($this->document_types_table)->count(),
            'count_users'           => CustomModel::q_get_where($this->users_table,array('user_status'=>'active'))->count(),
            'final_actions'         => CustomModel::q_get($this->final_actions_table)->count(),
            'pending'               => CustomModel::q_get_where($this->document_table,array('doc_status' => 'pending'))->count(),
            'completed'             => CustomModel::q_get_where($this->document_table,array('doc_status' => 'completed'))->count(),
            'cancelled'             => CustomModel::q_get_where($this->document_table,array('doc_status' => 'cancelled'))->count(),
            'added_today'           => DocumentsModel::added_document_date_now($date_now)
        );

        return $data;
    }
}
