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
        $data['users']    = CustomModel::q_get_where($this->users_table, array('user_type' => 'user'))->get();
        return view('dts.admin.contents.manage_users.manage_users')->with($data);
    }

    public function change_user_status(Request $request)
    {

     
        $id = $request->input('id');
        $items = array(

            'user_status' => $request->input('status')
        );

        $update = CustomModel::update_item($this->users_table, array('user_id' => $id), $items);
        if ($update) {

            $data = array('message' => 'Status Updated Successfully', 'response' => true);
        } else {

            $data = array('message' => 'Error', 'response' => false);
        }

        return response()->json($data);
    }
}
