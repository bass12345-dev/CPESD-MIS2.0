<?php

namespace App\Http\Controllers\dts\auth;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

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

        // print_r($request->all());
        $now = new \DateTime();
        $now->setTimezone(new \DateTimezone('Asia/Manila'));
        $items = array(
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'middle_name'       => $request->input('middle_name'),
            'extension'         => $request->input('extension'),
            'address'           => $request->input('address'),
            'contact_number'    => $request->input('contact_number'),
            'email_address'     => $request->input('email'),
            'username'          => $request->input('user_name'),
            'password'          => $request->input('password'),
            'off_id'            => $request->input('office'),
            'user_created'      => $now->format('Y-m-d H:i:s'),
            'user_status'       => 'active',
            'work_status'       => NULL,
            'user_type'         => 'user',
            'is_receiver'       => 'no'
        );

        if ($items['password'] == $request->input('confirm_password')) {

            $check = CustomModel::q_get_where('users', array('username' => $items['username']))->count();
            if ($check) {
                $data = array('message' => 'Username is Taken', 'response' => false);
            } else {
                if (strlen($items['password']) >= 5) {
                    $add = CustomModel::insert_item('users', $items);
                    if ($add) {
                        $data = array('message' => 'Registered Successfully', 'response' => true);
                    } else {
                        $data = array('message' => 'Something Wrong', 'response' => false);
                    }
                } else {
                    $data = array('message' => 'Password is too short', 'response' => false);
                }
            }
        } else {
            $data = array('message' => "Password don't match", 'response' => false);
        }
        return response()->json($data);
    }

    public function verify_user(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        $user = CustomModel::q_get_where('users', array('username' => $username));

        if ($user->count() > 0) {

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

            return response()->json(['message' => 'invalid Username.', 'response' => false]);
        }

    }
    public function dts_logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/dts');
    }
}
