<?php

namespace App\Repositories\dts;


use Illuminate\Support\Facades\DB;

class DocumentRepository
{

    public static function get_document_data($tn){
        $row = DB::table('documents')
        ->where('tracking_number', $tn)
        ->leftJoin('document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users', 'users.user_id', '=', 'documents.u_id')
        ->leftJoin('offices', 'offices.office_id', '=', 'documents.origin')
        ->first();
        return $row;
    }

    public static function get_document_history($tn){
        $row = DB::table('history')
        ->where('t_number',$tn)
        ->leftJoin('final_actions', 'final_actions.action_id', '=', 'history.final_action_taken')
        ->orderBy('history.history_id','asc');
        return $row;
    }

    public static function  history_user_data($where){
        $row =  DB::table('users')
        ->where($where)
        ->leftJoin('offices', 'offices.office_id', '=', 'users.off_id')
        ->get();
        return $row;
    }

    
}
