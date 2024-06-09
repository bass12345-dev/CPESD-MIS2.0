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

    public function verify_user(ValidateLoginRequest $request)
    {
           $validatedData = $request->validated();
           $user = $this->UserService->LoginUser($validatedData);


           if ($user) {
            // Registration successful
            return response()->json($user, 201);
        }
        // Handle registration failure
        return response()->json([
            'message' => 'Login Failed.'
        ], 422);      
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
