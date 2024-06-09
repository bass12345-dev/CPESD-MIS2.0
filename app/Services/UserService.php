<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CustomModel;
class UserService
{
    protected $userRepository;
    protected $user_table = 'users';
    private $log_in_history_table = 'logged_in_history';
    
    protected $request;

    public function __construct(UserRepository $userRepository, Request $request)
    {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    //USER LOGIN PROCESS
    public function LoginUser(array $auth)
    {
        $response = array();
        if ($auth['g-recaptcha-response'] != null) {

            $url = "https://www.google.com/recaptcha/api/siteverify";
            $body = [
                            'secret' => config('services.recaptcha.secret'),
                            'response' => $auth['g-recaptcha-response'],
                            'remoteip' => IpUtils::anonymize($this->request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
                    ];
            $response = Http::asForm()->post($url, $body);
            $result = json_decode($response);
            if ($response->successful() && $result->success == true) {  
                $user = $this->userRepository->q_get_where('users', array('username' => $auth['username']));
                if ($user->count() > 0) {
                    $user_row = $user->first();
                    if ($user_row->user_status == 'active') {
                        $check = password_verify($auth['password'], $user_row->password);
                        if ($check) {

                            $response = [
                                'response' => true,
                                'message' => 'Success'
                            ];
                            $this->set_session($user_row);
                            $this->store_login_history($user_row);
                        }else {
                            $response = [
                                'response' => false,
                                'message' => 'Invalid Password.'
                            ];
                        }
                        
                    }else {

                        $response = [
                            'response' => false,
                            'message' => 'Please Contact Administrator to activate your Account!!!'
                        ];

                    }  

                }else{

                    $response = [
                        'response' => false,
                        'message' => 'Invalid Username.'
                    ];
                }
                

            }else{
                $response = [
                    'response' => false,
                    'message' => 'Please Complete the Recaptcha Again to proceed.'
                ];
            }
        }else{
            $response = [
                'response' => false,
                'message' => 'Please Complete the Recaptcha Again to proceed.'
            ];
        }



        return $response;
    }


    //SET SESSION
    private function set_session($user_row){
        
        $this->request->session()->put(
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

    //STORE USER LOGIN
    private function store_login_history($user_row){

        $items = ['web_type'=> 'dts','user_id'=>$user_row->user_id,'logged_in_date'=> Carbon::now()->format('Y-m-d H:i:s') ];
         CustomModel::insert_item($this->log_in_history_table,$items);
    }
    

    //REGISTER USER
    public function registerUser(array $userData)
    {

        if ($this->userRepository->isEmailUnique($userData['email_address']) && $this->userRepository->isUsernameUnique($userData['username'])) {

            $items = array(
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'middle_name' => $userData['middle_name'],
                'extension' => $userData['extension'],
                'address' => $userData['address'],
                'contact_number' => $userData['contact_number'],
                'email_address' => $userData['email_address'],
                'username' => $userData['username'],
                'password' => password_hash($userData['password'], PASSWORD_DEFAULT),
                'off_id' => $userData['office'],
                'user_created' => Carbon::now()->format('Y-m-d H:i:s'),
                'user_status' => 'inactive',
                'work_status' => NULL,
                'user_type' => 'user',
                'is_receiver' => 'no',
                'is_oic' => 'no',
            );
            $user = $this->userRepository->insert_item($this->user_table, $items);
            return $user;
        }

        // Handle duplicate email scenario
        return null;
    }
}