<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomModel extends Model
{
    use HasFactory;


    //GET
    public static function q_get($table){
        return DB::table($table);
    }

    public static function q_get_order($table,$order_key,$order_by){
        return DB::table($table)->orderBy($order_key, $order_by);
    }

    public static function q_get_where($table,$where){
        return DB::table($table)->where($where);
    }

    public static function q_get_where_order($table,$where,$order_key,$order_by){
        return DB::table($table)->where($where)->orderBy($order_key, $order_by);
    }

    //INSERT ITEMS
    public static function insert_item($table,$data){
        return DB::table($table)->insert($data);
    }

    //UPDATE ITEMS 
    public static function update_item($table,$where,$data){
        return DB::table($table)->where($where)->update($data);
    }

    //DELETE
    public static function delete_item($table,$where){
        return DB::table($table)->where($where)->delete();
    }


    //Login History
    
    public static function get_logged_in_history(){
        $row = DB::table('logged_in_history')
        ->leftJoin('users', 'users.user_id', '=', 'logged_in_history.user_id')
        ->select(   //history
            
            'logged_in_history.logged_in_date as logged_in_date', 
            //User
            'users.first_name as first_name', 
            'users.middle_name as middle_name', 
            'users.last_name as last_name', 
            'users.extension as extension', 
          )
        ->where('logged_in_history.web_type','dts')
        ->orderBy('logged_in_history.logged_in_date', 'desc')
        ->get();
        return $row;
    }
    
}
