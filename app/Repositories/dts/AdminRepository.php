<?php

namespace App\Repositories\dts;

use App\Models\User;
use Illuminate\Support\Facades\DB;


class AdminRepository
{

  // Analytics Dashboard

  public static function get_documents_where_and_year($table,$where,$col,$year){

    return DB::table($table)->where($where)->whereYear($col, '=', $year);

  }

  public static function get_documents_where_and_year_and_month($table,$where,$col,$year,$m){

    return DB::table($table)->where($where)->whereMonth($col, '=', $m)->whereYear($col, '=', $year);

  }

  //Action Logs
  public function get_actions_dts_by_month($month, $year)
  {
    $row = DB::table('action_logs')
      ->leftJoin('users', 'users.user_id', '=', 'action_logs.user_id')
      ->leftJoin('documents', 'documents.document_id', '=', 'action_logs._id')
      ->select(   //history

        'action_logs.action_datetime as action_datetime',
        'action_logs.action as action',
        'action_logs.user_type as user_type',
        'action_logs._id as _id',
        //Documents
        'documents.tracking_number as tracking_number',
        //User
        'users.first_name as first_name',
        'users.middle_name as middle_name',
        'users.last_name as last_name',
        'users.extension as extension',
      )
      ->where('action_logs.web_type', 'dts')
      ->whereMonth('action_logs.action_datetime', '=', $month)
      ->whereYear('action_logs.action_datetime', '=', $year)
      ->orderBy('action_logs.action_datetime', 'desc')
      ->get();
    return $row;
  }

  public function get_actions_dts()
  {
    $row = DB::table('action_logs')
      ->leftJoin('users', 'users.user_id', '=', 'action_logs.user_id')
      ->leftJoin('documents', 'documents.document_id', '=', 'action_logs._id')
      ->select(   //history

        'action_logs.action_datetime as action_datetime',
        'action_logs.action as action',
        'action_logs.user_type as user_type',
        'action_logs._id as _id',
        //Documents
        'documents.tracking_number as tracking_number',
        //User
        'users.first_name as first_name',
        'users.middle_name as middle_name',
        'users.last_name as last_name',
        'users.extension as extension',
      )
      ->where('action_logs.web_type', 'dts')
      ->orderBy('action_logs.action_datetime', 'desc')
      ->get();
    return $row;
  }



  //Login History

  public static function get_logged_in_history()
  {
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
      ->where('logged_in_history.web_type', 'dts')
      ->orderBy('logged_in_history.logged_in_date', 'desc')
      ->get();
    return $row;
  }

  public static function get_logged_in_history_by_month($month,$year)
  {
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
      ->where('logged_in_history.web_type', 'dts')
      ->whereMonth('logged_in_history.logged_in_date', '=', $month)
      ->whereYear('logged_in_history.logged_in_date', '=', $year)
      ->orderBy('logged_in_history.logged_in_date', 'desc')
      ->get();
    return $row;
  }
}
