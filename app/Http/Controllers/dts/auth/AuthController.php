<?php

namespace App\Http\Controllers\dts\auth;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use PDF;

class AuthController extends Controller
{
    public function index()
    {
        return view('dts.auth.login');
    }

    public function register()
    {

        $data['barangay'] = config('app.barangay');
        $data['offices'] = CustomModel::q_get('offices')->get();
        return view('dts.auth.register')->with($data);
    }

    public function register_user(Request $request)
    {


        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $items = array(
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'middle_name'       => $request->input('middle_name'),
            'extension'         => $request->input('extension'),
            'address'           => $request->input('address'),
            'contact_number'    => empty($request->input('contact_number')) ? '' : $request->input('contact_number'),
            'email_address'     =>  empty($request->input('email')) ? '' : $request->input('email'), 
            'username'          => $request->input('user_name'),
            'password'          => password_hash($request->input('password'), PASSWORD_DEFAULT),
            'off_id'            => $request->input('office'),
            'user_created'      =>  Carbon::now()->format('Y-m-d H:i:s'),
            'user_status'       => 'inactive',
            'work_status'       => NULL,
            'user_type'         => 'user',
            'is_receiver'       => 'no'


        );

        if ($password == $confirm_password) {
            $check = CustomModel::q_get_where('users', array('username' => $items['username']))->count();
            if ($check == 0) {
    
                if (strlen($items['password']) >= 5) {
                    $add = CustomModel::insert_item('users', $items);
                    if ($add) {
                        $data = array('message' => 'Registered Successfully', 'response' => true);
                    } else {
                        $data = array('message' => 'Something Wrong', 'response' => false);
                    }
                }else {
                    $data = array('message' => 'Password is too short', 'response' => false);
                }
            }else {
                $data = array('message' => 'Username is Taken', 'response' => false);
            }
        } else {
            $data = array('message' => "Password don't match", 'response' => false);
        }

        return response()->json($data);

        // if ($request->input('password') == $request->input('confirm_password')) {

        //     $check = CustomModel::q_get_where('users', array('username' => $items['username']))->count();
        //     if ($check) {
        //         $data = array('message' => 'Username is Taken', 'response' => false);
        //     } else {
        //         if (strlen($items['password']) >= 5) {
        //             $add = CustomModel::insert_item('users', $items);
        //             if ($add) {
        //                 $data = array('message' => 'Registered Successfully', 'response' => true);
        //             } else {
        //                 $data = array('message' => 'Something Wrong', 'response' => false);
        //             }
        //         } else {
        //             $data = array('message' => 'Password is too short', 'response' => false);
        //         }
        //     }
        // } else {
        //     $data = array('message' => "Password don't match", 'response' => false);
        // }
     
    }

    public function verify_user(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        $user = CustomModel::q_get_where('users', array('username' => $username));

        if ($user->count() > 0) {

            if ($user->get()[0]->user_status == 'active') {

                $check = password_verify($password, $user->get()[0]->password);

                if ($check) {



                    $request->session()->put(
                        array(
                            'name' => $user->get()[0]->first_name,
                            '_id' => $user->get()[0]->user_id,
                            'isLoggedIn' => true,
                            'user_type' => $user->get()[0]->user_type,
                            'is_receiver' => $user->get()[0]->is_receiver
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
    public function dts_logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/dts');
    }
}
