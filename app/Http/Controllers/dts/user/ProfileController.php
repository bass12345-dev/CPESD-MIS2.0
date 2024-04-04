<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $user_table = "users";
    public function index(){
        $data['user_data']          = CustomModel::q_get_where($this->user_table,array('user_id'=> $_GET['u_id']))->first();
        $data['barangay']           = config('app.barangay');
        $data['title']              = $data['user_data']->first_name.' '.$data['user_data']->middle_name.' '.$data['user_data']->last_name.' '.$data['user_data']->extension;
        return view('dts.users.contents.profile.profile')->with($data);
    }

    public function update(Request $request){

    
        $items = array(
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'middle_name'       => $request->input('middle_name'),
            'extension'         => $request->input('extension'),
            'address'           => $request->input('address'),
            'contact_number'    => $request->input('contact_number'),
            'email_address'     => $request->input('email'), 
        );
        $where = array('user_id' => $request->input('id'));
        $update     = CustomModel::update_item($this->user_table,$where,$items);
          if ($update) {
                $data = array('message' => 'Updated Successfully' , 'response' => true );
            }else {
                $data = array('message' => 'Something Wrong/No Changes Apply' , 'response' => false );
            }
            return response()->json($data);

    }

    public function update_password(Request $request){

        $password = $request->input('new_password');
        $confirm_password = $request->input('confirm_new_password');

        if($password == $confirm_password){

            if (strlen($password) >= 5) {

            $where = array('user_id' => session('_id'));
            $items = array('password'=>  password_hash($password, PASSWORD_DEFAULT));
            $update     = CustomModel::update_item($this->user_table,$where,$items);
              if ($update) {
                    $data = array('message' => 'Updated Successfully' , 'response' => true );
                }else {
                    $data = array('message' => 'Something Wrong/No Changes Apply' , 'response' => false );
                }

            }else {
                $data = array('message' => 'Password is too short', 'response' => false);
            }

        }else {
            $data = array('message' => "Password Don't Match" , 'response' => false );
        }
    
       
         return response()->json($data);

    }

    public function check(Request $request){

        $password = $request->input('old_password');
        $id = session('_id');

        $user = CustomModel::q_get_where('users', array('user_id' => $id));

        if ($user->count() > 0) {

            $check = password_verify($password, $user->get()[0]->password);

            if ($check) {

                return response()->json(['message' => 'Success.', 'response' => true]);


            } else {
                return response()->json(['message' => 'invalid Password.', 'response' => false]);

            }


        } else {

            return response()->json(['message' => 'invalid Username.', 'response' => false]);
        }

    }
}
