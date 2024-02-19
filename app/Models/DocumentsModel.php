<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DocumentsModel extends Model
{
    use HasFactory;
    
    protected $table = 'documents';

    protected $fillable = [
        'document_id ',
        'tracking_number',
        'document_name',
        'u_id',
        'offi_id',
        'doc_type',
        'document_description',
        'doc_status',
        'destination_type',
        'created'
    ];

    public $timestamps = false;

    //Admin Query

    public static function  get_all_documents(){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select('documents.created as created','documents.tracking_number as tracking_number', 
                 'documents.document_name as   document_name', 'documents.document_id as document_id', 
                 'document_types.type_name', 'users.first_name as first_name', 'users.middle_name as middle_name', 'users.last_name as last_name', 'users.extension as extension', DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;
    }

    public static function  get_all_documents_with_limit($limit){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select('documents.created as created','documents.tracking_number as tracking_number', 
                 'documents.document_name as   document_name', 'documents.document_id as document_id', 
                 'document_types.type_name', 'users.first_name as first_name', 'users.middle_name as middle_name', 'users.last_name as last_name', 'users.extension as extension', DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->orderBy('documents.document_id', 'desc')->limit($limit)->get();
        return $rows;
        
    }



    public static function get_document_data($tn){
        $row = DB::table('documents')
        ->where('tracking_number', $tn)
        ->leftJoin('document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users', 'users.user_id', '=', 'documents.u_id')
        ->leftJoin('offices', 'offices.office_id', '=', 'documents.offi_id')
        ->first();
        return $row;
    }


    public static function get_history($tn){
        $row = DB::table('history')
        ->where('t_number',$tn)
        ->leftJoin('final_actions', 'final_actions.action_id', '=', 'history.final_action_taken');
        return $row;
    }

    public static function  history_user_data($where){
        $row =  DB::table('users')
        ->where($where)
        ->leftJoin('offices', 'offices.office_id', '=', 'users.off_id')
        ->get();
        return $row;
    }

    //User Query


    public static function get_my_documents(){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->select('documents.created as d_created','documents.tracking_number as tracking_number', 'documents.document_name as document_name', 'documents.document_id as document_id', 'documents.doc_type as doc_type', 'documents.document_description as document_description', 'documents.destination_type as destination_type','document_types.type_name')
        ->where('u_id', session('_id'))
        ->orderBy('documents.document_id', 'desc')
        ->get();
        return $rows;
    }

    public static function get_incoming_documents(){

        $rows = DB::table('history as history')
            ->leftJoin('documents as documents', 'documents.tracking_number', '=', 'history.t_number')
            ->leftJoin('users as users', 'users.user_id', '=', 'history.user1')
            ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
            ->select('documents.tracking_number as tracking_number','documents.document_name as document_name',
                     'documents.document_id as document_id','users.user_type as user_type',
                     'document_types.type_name as type_name', 'history.release_date as release_date',
                     'history.history_id as history_id','history.remarks as remarks', 'users.first_name as first_name', 'users.middle_name as middle_name', 'users.last_name as last_name', 'users.extension as extension',
                     DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
            ->where('user2', session('_id'))
            ->where('received_status', NULL)
            ->where('status', 'torec')
            ->where('to_receiver', 'no')
            ->where('release_status',NULL )
            ->orderBy('received_date', 'desc')->get();
            
        return $rows;
    }

    public static function get_received_documents(){


        $data = [];

        $rows = DB::table('history as history')
            ->leftJoin('documents as documents', 'documents.tracking_number', '=', 'history.t_number')
            ->leftJoin('users as users', 'users.user_id', '=', 'history.user2')
            ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
            ->select('documents.tracking_number as tracking_number','documents.document_name as document_name',
                     'documents.document_id as document_id','users.user_type as user_type',
                     'document_types.type_name as type_name', 'history.received_date as received_date',
                     'history.history_id as history_id','history.remarks as remarks')
            ->where('user2', session('_id'))
            ->where('received_status', 1)
            ->where('release_status',NULL )
            ->where('status' , 'received')
            ->where('documents.destination_type', 'complex')
            ->where('to_receiver' , 'no')
            ->orderBy('received_date', 'desc')->get();

        return $rows;

    }


    public static function get_forwarded_documents(){
        $row = DB::table('history as history')
             ->leftJoin('documents as documents', 'documents.tracking_number', '=', 'history.t_number')
             ->leftJoin('users as users', 'users.user_id', '=', 'history.user2')
             ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
             ->select('documents.tracking_number as tracking_number','documents.document_name as document_name',
                      'documents.document_id as document_id','users.user_type as user_type',
                      'document_types.type_name as type_name', 'history.release_date as release_date',
                      'history.history_id as history_id','history.remarks as remarks','users.first_name as first_name', 'users.middle_name as middle_name', 'users.last_name as last_name', 'users.extension as extension',
                      DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
             ->where('user1', session('_id'))
             ->where('received_status', NULL)
             ->where('status', 'torec')
             ->where('release_status',NULL )
             ->orderBy('received_date', 'desc')->get();

        return $row;
    }



    public static function get_receiver_incoming_documents(){
        $row = DB::table('history as history')
            ->leftJoin('documents as documents', 'documents.tracking_number', '=', 'history.t_number')
            ->leftJoin('users as users', 'users.user_id', '=', 'history.user1')
            ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
            ->select('documents.tracking_number as tracking_number','documents.document_name as document_name',
                     'documents.document_id as document_id','users.user_type as user_type',
                     'document_types.type_name as type_name', 'history.release_date as release_date',
                     'history.history_id as history_id','history.remarks as remarks', 'users.first_name as first_name', 'users.middle_name as middle_name', 'users.last_name as last_name', 'users.extension as extension',
                     DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
            ->where('user2', session('_id'))
            ->where('received_status', NULL)
            ->where('status', 'torec')
            ->where('to_receiver', 'yes')
            ->where('release_status',NULL )
            ->orderBy('received_date', 'desc')->get();

            return $row;
    }

    public static function get_receiver_received_documents(){

        $rows = DB::table('history as history')
        ->leftJoin('documents as documents', 'documents.tracking_number', '=', 'history.t_number')
        ->leftJoin('users as users', 'users.user_id', '=', 'history.user2')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->select('documents.tracking_number as tracking_number','documents.document_name as document_name',
                 'documents.document_id as document_id','users.user_type as user_type',
                 'document_types.type_name as type_name', 'history.received_date as received_date',
                 'history.history_id as history_id','history.remarks as remarks')
        ->where('user2', session('_id'))
        ->where('received_status', 1)
        ->where('release_status',NULL )
        ->where('status' , 'received')
        ->where('to_receiver','yes')
        // ->where('documents.destination_type', 'simple')
        ->orderBy('received_date', 'desc')->get();

        return $rows;

    }


}
