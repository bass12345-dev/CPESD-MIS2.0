<?php

namespace App\Repositories\dts;

use App\Models\User;
use Illuminate\Support\Facades\DB;


class AdminRepository
{
    public function get_actions_dts($month,$year){
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
            ->where('action_logs.web_type','dts')
            ->whereMonth('action_logs.action_datetime', '=', $month)
            ->whereYear('action_logs.action_datetime', '=', $year)
            ->orderBy('action_logs.action_datetime', 'desc')
            ->get();
            return $row;
    }
}
