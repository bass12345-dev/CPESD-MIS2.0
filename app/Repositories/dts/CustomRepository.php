<?php

namespace App\Repositories\dts;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class CustomRepository
{

    public static function q_get_where($table,$where){
        return DB::table($table)->where($where);
    }

    public static function q_get($table){
        return DB::table($table);
    }
    
    public function insert_item($table,$data){
        return DB::table($table)->insert($data);
    }




    

    
}
