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


    public static function  get_all_documents(){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select(    //Documents
                    'documents.created as created', 
                    'documents.doc_status as doc_status',  
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as   document_name', 
                    'documents.document_id as document_id', 
                    'documents.doc_status as doc_status',
                    'documents.u_id as u_id',
                    //Document Types
                    'document_types.type_name',  
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;
    }

    
}
