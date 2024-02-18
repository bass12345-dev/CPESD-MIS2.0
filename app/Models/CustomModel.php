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
    
}
