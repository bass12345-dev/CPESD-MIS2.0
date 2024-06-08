<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class UserService
{
    protected $userRepository;
    protected $user_table = 'users';

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function LoginUser(array $auth,$request)
    {
        if ($auth['g-recaptcha-response'] != null) {

            $url = "https://www.google.com/recaptcha/api/siteverify";
            $body = [
                            'secret' => config('services.recaptcha.secret'),
                            'response' => $auth['g-recaptcha-response'],
                            'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
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
                            // $this->set_session($request,$user_row);
                            // $this->store_login_history($user_row);
                        }
                        
                    }

                }
                

            }
        }



        return null;
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