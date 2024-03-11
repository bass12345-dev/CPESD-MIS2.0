<?php

namespace App\Http\Controllers\watchlisted\auth;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        // return view('maintainance.index');
        return view('watchlisted.auth.code_login');
    }


    public function new_user_login()
    {
        // return view('maintainance.index');
        return view('watchlisted.auth.new_user_login');
    }

    public function verify_user(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        $user = CustomModel::q_get_where('users', array('username' => $username));

        if ($user->count() > 0) {

            if ($user->get()[0]->user_status == 'active') {

                $check = password_verify($password, $user->get()[0]->password);

                if ($check) {



                    $request->session()->put(
                        array(
                            'name'              => $user->get()[0]->first_name,
                            'watch_id'          => $user->get()[0]->user_id,
                            'user_type'         => $user->get()[0]->user_type ,
                            'isLoggedInWatch'   => true,
                        )
                    );

                    return response()->json(['message' => 'Success.', 'response' => true]);
                } else {
                    return response()->json(['message' => 'invalid Password.', 'response' => false]);
                }
            } else {
                return response()->json(['message' => 'Please Contact Administrator to activate your Account!!!', 'response' => false]);
            }
        } else {

            return response()->json(['message' => 'invalid Username.', 'response' => false]);
        }


    }

    public function verify_code(Request $request)
    {

        $key = CustomModel::q_get_where('security', array('us_id' => 8));

        if ($key->count() > 0) {

            $verify_code = password_verify($request->input('code'), $key->get()[0]->security_code);

            if ($verify_code) {
                $user = $key->get()[0];
                $request->session()->put(
                    array(
                        'watch_id' => $user->us_id,
                        'isLoggedInWatch' => true,
                        'name' => 'Administrator',
                    )
                );
                return response()->json(['message' => $user->us_id, 'mes' => 'Success', 'response' => true]);
            } else {
                return response()->json(['message' => 'Invalid Security Code', 'response' => false]);
            }
        } else {
            return response()->json(['message' => 'ID not found Please Contact Developer', 'response' => false]);
        }
    }

    public function change_code(Request $request)
    {

        $id = base64_decode($request->input('id'));
        $new = $request->input('new');
        $old = $request->input('old');

        $key = CustomModel::q_get_where('security', array('us_id' => $id));

        if ($key->count() > 0) {

            $verify_code = password_verify($old, $key->get()[0]->security_code);

            if ($verify_code) {

                $update = CustomModel::update_item('security',array('us_id' => $id),array('security_code' => password_hash($new, PASSWORD_DEFAULT)));
                
                if ($update) {

                    $data = array('message' => 'Updated Successfully', 'response' => true);

                } else {

                    $data = array('message' => 'Something Wrong', 'response' => false);
                }

                return response()->json($data);

                // code...
            } else {

                return response()->json(['message' => 'Invalid Old Security Code', 'response' => false]);
            }



        } else {

            return response()->json(['message' => 'ID not found', 'response' => false]);


        }
    }

    public function wl_logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/watchlisted');
    }
}
