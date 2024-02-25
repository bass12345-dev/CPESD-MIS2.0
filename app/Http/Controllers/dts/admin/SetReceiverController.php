<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class SetReceiverController extends Controller
{
    public $users_table = "users";
    public function index(Request $request)
    {

        $data['title'] = 'Manage Receiver';
        $data['users'] = CustomModel::q_get_where($this->users_table, array('user_type' => 'user', 'user_status' => 'active'))->get();
        $data['receiver'] = CustomModel::q_get_where($this->users_table, array('is_receiver' => 'yes'))->first();
        return view('dts.admin.contents.set_receiver.set_receiver')->with($data);
    }

    public function update_receiver(Request $request)
    {
        $user_id = $request->input('user_id');
        $current_receiver = $request->input('receiver_id');


        $update = CustomModel::update_item($this->users_table, array('user_id' => $current_receiver), array('is_receiver' => 'no'));

        if ($update) {
            $update1 = CustomModel::update_item($this->users_table, array('user_id' => $user_id), array('is_receiver' => 'yes'));
            if ($update) {
                $data = array('message' => 'Updated Successfully', 'response' => true);
            } else {
                $data = array('message' => 'Something Wrong/No Changes Apply', 'response' => false);
            }

        } else {
            $data = array('message' => 'Something Wrong/No Changes Apply', 'response' => false);
        }

        return response()->json($data);
      
    }
}
