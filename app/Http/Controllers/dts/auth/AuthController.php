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
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\ValidateLoginRequest;
use App\Models\User;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $UserService;
    private $log_in_history_table = 'logged_in_history';
    
    public function __construct(UserService $UserService){
        $this->UserService = $UserService;
    }
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

    public function register_user(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->UserService->registerUser($validatedData);
        if ($user) {
            // Registration successful
            return response()->json([
                'message' => 'User Registered Successfully | Please wait for Activation', 
                'response' => true
            ], 201);
        }
        // Handle registration failure
        return response()->json([
            'message' => 'User registration failed. Email exists.'
        ], 422);      
     
    }

    public function verify_user(ValidateLoginRequest $request,Request $request1)
    {
           $validatedData = $request->validated();
           $user = $this->UserService->LoginUser($validatedData,$request1);


           if ($user) {
            // Registration successful
            return response()->json([
                'message' => 'Success Successfully', 
                'response' => true
            ], 201);
        }
        // Handle registration failure
        return response()->json([
            'message' => 'Login Failed.'
        ], 422);      


            
    //     $username = $request->input('username');
    //     $password = $request->input('password');

    //     $recaptcha_response = $request->input('g-recaptcha-response');

    

    //     if($recaptcha_response != null) {


    //         $url = "https://www.google.com/recaptcha/api/siteverify";


    //         $body = [
    //             'secret' => config('services.recaptcha.secret'),
    //             'response' => $recaptcha_response,
    //             'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
    //         ];
    
    //         $response = Http::asForm()->post($url, $body);
    
    //         $result = json_decode($response);

        
    //     if ($response->successful() && $result->success == true) {  

    //         $user = CustomModel::q_get_where('users', array('username' => $username));

    //         if ($user->count() > 0) {
                
    //             $user_row = $user->first();
    
    //             if ($user_row->user_status == 'active') {

    //                 $check = password_verify($password, $user_row->password);
    
    //                 if ($check) {

    //                     $this->set_session($request,$user_row);
    //                     $this->store_login_history($user_row);
    //                     return response()->json(['message' => 'Success.', 'response' => true]);
    //                 } else {
    //                     return response()->json(['message' => 'invalid Password.', 'response' => false]);
    //                 }
    //             } else {
    //                 return response()->json(['message' => 'Please Contact Administrator to activate your Account!!!', 'response' => false]);
    //             }
    //         } else {
    
    //             return response()->json(['message' => 'invalid Username.', 'response' => false]);
    //         }
          
    //     } else {
    //         return response()->json(['message' => 'Please Complete the Recaptcha Again to proceed.', 'response' => false]);
    //     }

    // }else {
    //     return response()->json(['message' => 'Please Complete the Recaptcha to proceed.', 'response' => false]);
    // }
      
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
