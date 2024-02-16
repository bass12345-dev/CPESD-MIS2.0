<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    public $document_table          = "documents";
    public $office_table            = "offices";
    public $document_types_table    = "document_types";
    public $users_table             = "users";
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['count'] = $this->count_menu_data();
        return view('dts.admin.contents.dashboard.dashboard')->with($data);
    }

    public function count_menu_data()
    {
        $data = array(

            'count_documents'       => CustomModel::q_get($this->document_table)->count(),
            'count_offices'         => CustomModel::q_get_where($this->office_table,array('office_status' => 'active'))->count(),
            'count_document_types'  =>  CustomModel::q_get($this->document_types_table)->count(),
            'count_users'           => CustomModel::q_get_where($this->users_table,array('user_status'=>'active'))->count()
        );

        return $data;
    }
}
