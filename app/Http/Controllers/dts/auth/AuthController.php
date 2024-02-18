<?php

namespace App\Http\Controllers\dts\auth;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('dts.auth.login');
    }

    public function verify_user(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');
        
        $user = CustomModel::q_get_where('users', array('username' =>$username));
    
        if ($user->count() > 0 ) {

            $check = password_verify($password, $user->get()[0]->password);

            if ($check) {

                 

                 $request->session()->put(array(
                    'name' => $user->get()[0]->first_name,
                    '_id' => $user->get()[0]->user_id,
                    'isLoggedIn' => true,
                    'user_type' =>$user->get()[0]->user_type, 
                    'is_receiver' => $user->get()[0]->is_receiver  ));

                 return response()->json(['message'=>'Success.','response'=> true]);


                 }else{
                     return response()->json(['message'=>'invalid Password.','response'=> false]);

                  }


        }else {

            return response()->json(['message'=>'invalid Username.','response'=> false]);
        }

    }
    public function dts_logout(Request $request){
        $request->session()->flush();
        return redirect('/dts');
    }
}
