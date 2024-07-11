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

    public static function get_outgoing_history($tn){

        $row = DB::table('outgoing_documents as outgoing_documents')
             ->leftJoin('documents as documents', 'documents.document_id', '=', 'outgoing_documents.doc_id')
             ->leftJoin('users as users', 'users.user_id', '=', 'outgoing_documents.user_id')
             ->leftJoin('offices as offices', 'offices.office_id', '=', 'outgoing_documents.off_id')
             ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
             ->select(  //Document
                        'documents.tracking_number as tracking_number',
                        'documents.doc_status as doc_status' ,
                        'documents.document_name as document_name',
                        'documents.document_id as document_id',
                        //Documen Type
                        'document_types.type_name as type_name',
                        //Outgoing
                        'outgoing_documents.remarks as remarks',
                        'outgoing_documents.outgoing_date as outgoing_date',
                        'outgoing_documents.outgoing_date_received as outgoing_date_received',
                        'outgoing_documents.doc_id as doc_id',
                        'outgoing_documents.outgoing_id as outgoing_id',
                        'outgoing_documents.status as status',
                        //Office
                        'offices.office as office',
                        //User
                        'users.user_id as user_id',
                        'users.user_type as user_type',
                        'users.first_name as first_name', 
                        'users.middle_name as middle_name', 
                        'users.last_name as last_name', 
                        'users.extension as extension',
             )
             ->where('documents.tracking_number', $tn)
             ->orderBy('outgoing_documents.outgoing_id', 'asc')
            ->get();

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



    public static function cancel_documents(){
        
    }

    public static function search($search)
    {
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->leftJoin('history as history', 'history.t_number', '=', 'documents.tracking_number')
        ->select(    //Documents
                    'documents.created as created', 
                    'documents.doc_status as doc_status',  
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as   document_name', 
                    'documents.document_id as document_id', 
                    'documents.doc_status as doc_status',
                    'documents.document_description as document_description',
                    'documents.u_id as u_id',
                    //Document Types
                    'document_types.type_name',  
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    //Histoty 
                    'history.remarks as remarks',
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->where(DB::raw("concat(documents.document_name, ' ', documents.document_description)"), 'LIKE', "%" . $search . "%")
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;

    }

    
}
