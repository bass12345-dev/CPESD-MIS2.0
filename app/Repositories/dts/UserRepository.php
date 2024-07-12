<?php

namespace App\Repositories\dts;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function isEmailUnique($email)
    {
        return DB::table('users')->where('email_address', $email)->doesntExist();
    }

    public function isUsernameUnique($email)
    {
        return DB::table('users')->where('username', $email)->doesntExist();
    }


    public function insert_item($table,$data){
        return DB::table($table)->insert($data);
    }

    public static function q_get_where($table,$where){
        return DB::table($table)->where($where);
    }





    

    

    
}
