<?php

namespace App\Http\Controllers\dts\auth;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use PDF;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    private $log_in_history_table = 'logged_in_history';
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

      
     
    }

    public function verify_user(Request $request)
    {
        
        $username = $request->input('username');
        $password = $request->input('password');

        $recaptcha_response = $request->input('g-recaptcha-response');

    

        if($recaptcha_response != null) {


            $url = "https://www.google.com/recaptcha/api/siteverify";


            $body = [
                'secret' => config('services.recaptcha.secret'),
                'response' => $recaptcha_response,
                'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
            ];
    
            $response = Http::asForm()->post($url, $body);
    
            $result = json_decode($response);

        
        if ($response->successful() && $result->success == true) {  

            $user = CustomModel::q_get_where('users', array('username' => $username));

            if ($user->count() > 0) {
                
                $user_row = $user->first();
    
                if ($user_row->user_status == 'active') {

                    $check = password_verify($password, $user_row->password);
    
                    if ($check) {

                        $this->set_session($request,$user_row);
                        $this->store_login_history($user_row);
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
          
        } else {
            return response()->json(['message' => 'Please Complete the Recaptcha Again to proceed.', 'response' => false]);
        }

    }else {
        return response()->json(['message' => 'Please Complete the Recaptcha to proceed.', 'response' => false]);
    }
      
    }


    private function store_login_history($user_row){

            $items = ['web_type'=> 'dts','user_id'=>$user_row->user_id,'logged_in_date'=> Carbon::now()->format('Y-m-d H:i:s') ];
             CustomModel::insert_item($this->log_in_history_table,$items);
    }


    private function set_session($request,$user_row){
        
        $request->session()->put(
            array(
                'name'              => $user_row->first_name,
                '_id'               => $user_row->user_id,
                'isLoggedIn'        => true,
                'user_type'         => $user_row->user_type,
                'is_receiver'       => $user_row->is_receiver,
                'is_oic'            => $user_row->is_oic == 'yes' ? true : false
            )
        );
    }

    public function strong_password(Request $request){
        
        $old_password = $request->input('old_password'); 
        $new_password = $request->input('old_password'); 
        $confirm_new_password = $request->input('old_password'); 

        if($new_password === $confirm_new_password){
           $data = array(
                    
                    'response' => true
           );
        }else{
            $data = array(
                    'response' => false
            );
        }
        
        return response()->json($data);

        
    }


    public function dts_logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/dts');
    }
}
