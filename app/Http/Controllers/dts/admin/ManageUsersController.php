<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{   
    public $users_table = "users";
    public function index()
    {
        $data['title']      = 'Manage Users';
        $data['users']    = CustomModel::q_get_where($this->users_table,array('user_type' => 'user'))->get();
        return view('dts.admin.contents.manage_users.manage_users')->with($data);
    }
}
