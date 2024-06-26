<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class SetReceiverController extends Controller
{
    private $users_table = "users";
    private $history_table = "history";
    public function index(Request $request)
    {

        $data['title'] = 'Manage Staff';
        $data['users'] = CustomModel::q_get_where($this->users_table, array('user_status' => 'active'))->get();
        $data['receiver'] = CustomModel::q_get_where($this->users_table, array('is_receiver' => 'yes'))->first();
        $data['oic'] = CustomModel::q_get_where($this->users_table, array('is_oic' => 'yes'))->first();
        return view('dts.admin.contents.set_receiver.set_receiver')->with($data);
    }




    // $id = session('_id');
    // $count = CustomModel::q_get_where($this->history_table, array('user2' => $id, 'received_status' => NULL, 'status' => 'torec', 'release_status' => NULL, 'to_receiver' => 'yes'))->count();
    // return $count;

    public function update_receiver(Request $request)
    {
        $user_id = $request->input('user_id');
        $current_receiver = $request->input('receiver_id');

        $count = CustomModel::q_get_where($this->history_table, array('user2' => $current_receiver, 'received_status' => NULL, 'status' => 'torec', 'release_status' => NULL, 'to_receiver' => 'yes'))->count();

        if ($count == 0) {

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

        } else {
            $data = array('message' => 'Current Receiver has '.$count.' pending document\'s. Please clear all to proceed in changing final receiver ', 'response' => false);
        }



        return response()->json($data);

    }


    public function update_oic(Request $request)
    {
        $user_id = $request->input('user_id');
        $current_oic = $request->input('oic_id');



        $update = CustomModel::update_item($this->users_table, array('user_id' => $current_oic), array('is_oic' => 'no'));

        if ($update) {
            $update1 = CustomModel::update_item($this->users_table, array('user_id' => $user_id), array('is_oic' => 'yes', 'user_type' => 'admin'));
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
