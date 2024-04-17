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

    public static function  get_all_documents_with_limit_completed($limit){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select(   //Documents
                    'documents.created as created',
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as document_name', 
                    'documents.document_id as document_id', 
                    'documents.destination_type as destination_type', 
                    //Document Types
                    'document_types.type_name as type_name', 
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->where('documents.doc_status', 'completed')
        ->orderBy('documents.tracking_number', 'desc')->limit($limit)->get();
        return $rows;
        
    }

    public static function  get_all_documents_with_limit($limit){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select(   //Documents
                    'documents.created as created',
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as document_name', 
                    'documents.document_id as document_id', 
                    'documents.destination_type as destination_type', 
                    //Document Types
                    'document_types.type_name as type_name', 
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->orderBy('documents.tracking_number', 'desc')->limit($limit)->get();
        return $rows;
        
    }

    



    public static function get_document_data($tn){
        $row = DB::table('documents')
        ->where('tracking_number', $tn)
        ->leftJoin('document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users', 'users.user_id', '=', 'documents.u_id')
        ->leftJoin('offices', 'offices.office_id', '=', 'documents.origin')
        
        ->first();
        return $row;
    }

    public static function get_document_where($id){
        $row = DB::table('documents')
        ->where('document_id', $id)
        ->leftJoin('document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users', 'users.user_id', '=', 'documents.u_id')
        ->leftJoin('offices', 'offices.office_id', '=', 'documents.offi_id')
        ->first();
        return $row;
    }

    public static function get_document_where_id($id){
        $row = DB::table('documents')
        ->where('document_id', $id)
        
        ->leftJoin('document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users', 'users.user_id', '=', 'documents.u_id')
        // ->leftJoin('offices', 'offices.office_id', '=', 'documents.offi_id')
        ->leftJoin('offices as offices', 'offices.office_id', '=', 'documents.origin')
        ->select(   //Documents
            'documents.created as document_created',
            'documents.tracking_number as tracking_number', 
            'documents.document_name as   document_name', 
            'documents.document_id as document_id', 
            'document_types.type_name as type_name', 
            'documents.doc_status as doc_status', 
            'documents.u_id as u_id', 
            'documents.document_description as document_description',
            'documents.destination_type as destination_type',
            //User
            'users.first_name as first_name', 
            'users.middle_name as middle_name', 
            'users.last_name as last_name', 
            'users.extension as extension', 
            //Origin
            'offices.office as origin',
            DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->first();
        return $row;
    }


    public static function get_history($tn){
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


    public static function added_document_date_now($now){

        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select(   //Documents
                    'documents.created as created',
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as   document_name', 
                    'documents.document_id as document_id', 
                    'document_types.type_name as type_name', 
                    'documents.doc_status as doc_status', 
                    'documents.u_id as u_id', 
                    'documents.destination_type as destination_type',
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->whereDate('documents.created', '=', $now)
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;

    }


    public static function completed_document_date_now($now){

        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select(   //Documents
                    'documents.created as created',
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as   document_name', 
                    'documents.document_id as document_id', 
                    'document_types.type_name as type_name', 
                    'documents.doc_status as doc_status', 
                    'documents.u_id as u_id', 
                    'documents.destination_type as destination_type',
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->whereDate('documents.completed_on', '=', $now)
        ->where('documents.doc_status','completed')
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;

    }

    public static function user_added_document_date_now($now){

        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select(   //Documents
                    'documents.created as created',
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as   document_name', 
                    'documents.document_id as document_id', 
                    'document_types.type_name as type_name', 
                    'documents.doc_status as doc_status', 
                    'documents.u_id as u_id', 
                    'documents.destination_type as destination_type',
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->whereDate('documents.created', '=', $now)
        ->where('u_id',session('_id'))
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;

    }


    public static function  filter_date_documents($start,$end){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select(   //Documents
                    'documents.created as created',
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as   document_name', 
                    'documents.document_id as document_id', 
                    'document_types.type_name', 
                    'documents.doc_status as doc_status', 
                    'documents.u_id as u_id', 
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->whereDate('documents.created', '>=', $start)
        ->whereDate('documents.created', '<=', $end)
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;
    }

    public static function  filter_date_documents_where_doc_type($start,$end,$doc_type){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select('documents.created as created','documents.tracking_number as tracking_number', 'documents.doc_type as doc_type', 
                 'documents.document_name as   document_name', 'documents.document_id as document_id', 
                 'document_types.type_name', 'documents.doc_status as doc_status', 'documents.u_id as u_id', 'users.first_name as first_name', 'users.middle_name as middle_name', 'users.last_name as last_name', 'users.extension as extension', DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->where(DB::raw("DATE_FORMAT(documents.created,'%Y-%m-%d') >= '".$start."' "))
        ->where(DB::raw("DATE_FORMAT(documents.created,'%Y-%m-%d') <= '".$end."' "))
        ->where('documents.doc_type',$doc_type)
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;
    }


    public static function  filter_date_documents_where_doc_status($start,$end,$status){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select('documents.created as created','documents.tracking_number as tracking_number', 'documents.doc_type as doc_type', 
                 'documents.document_name as   document_name', 'documents.document_id as document_id', 
                 'document_types.type_name', 'documents.doc_status as doc_status', 'documents.u_id as u_id', 'users.first_name as first_name', 'users.middle_name as middle_name', 'users.last_name as last_name', 'users.extension as extension', DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->where(DB::raw("DATE_FORMAT(documents.created,'%Y-%m-%d') >= '".$start."' "))
        ->where(DB::raw("DATE_FORMAT(documents.created,'%Y-%m-%d') <= '".$end."' "))
        ->where('documents.doc_status',$status)
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;
    }

    public static function filter_date_documents_where_doc_status_and_doc_type($start,$end,$status,$type){

        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->select('documents.created as created','documents.tracking_number as tracking_number', 'documents.doc_type as doc_type', 
                 'documents.document_name as   document_name', 'documents.document_id as document_id', 
                 'document_types.type_name', 'documents.doc_status as doc_status', 'documents.u_id as u_id', 'users.first_name as first_name', 'users.middle_name as middle_name', 'users.last_name as last_name', 'users.extension as extension', DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->where(DB::raw("DATE_FORMAT(documents.created,'%Y-%m-%d') >= '".$start."' "))
        ->where(DB::raw("DATE_FORMAT(documents.created,'%Y-%m-%d') <= '".$end."' "))
        ->where('documents.doc_status',$status)
        ->where('documents.doc_type',$type)
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;

    }

    //User Query


    public static function get_my_documents(){
        $rows = DB::table('documents as documents')
        ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
        ->leftJoin('users as users', 'users.user_id', '=', 'documents.u_id')
        ->leftJoin('offices as offices', 'offices.office_id', '=', 'documents.origin')
        ->select(   'documents.created as d_created', 
                    'documents.doc_status as doc_status',
                    'documents.tracking_number as tracking_number', 
                    'documents.document_name as document_name', 
                    'documents.document_id as document_id', 
                    'documents.doc_type as doc_type', 
                    'documents.document_description as document_description', 
                    'documents.destination_type as destination_type',
                    'documents.origin as origin_id',
                    'document_types.type_name as type_name',
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension',

                    'offices.office as origin',


                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name")
                    )
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
            ->select(   //Document
                        'documents.tracking_number as tracking_number',
                        'documents.document_name as document_name', 
                        'documents.doc_status as doc_status' ,
                        'documents.document_id as document_id',
                        //Document Type
                        'document_types.type_name as type_name',
                        //History
                        'history.release_date as release_date',
                        'history.history_id as history_id',
                        'history.remarks as remarks', 
                         //User
                        'users.user_type as user_type',
                        'users.first_name as first_name', 
                        'users.middle_name as middle_name', 
                        'users.last_name as last_name', 
                        'users.extension as extension',
                        DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
            ->where('user2', session('_id'))
            ->where('doc_status'  ,'!=', 'cancelled')
            ->where('received_status', NULL)
            ->where('status', 'torec')
            ->where('to_receiver', 'no')
            ->where('release_status',NULL )
            ->orderBy('tracking_number', 'desc')->get();
            
        return $rows;
    }

    public static function get_received_documents(){


        $data = [];

        $rows = DB::table('history as history')
            ->leftJoin('documents as documents', 'documents.tracking_number', '=', 'history.t_number')
            ->leftJoin('users as users', 'users.user_id', '=', 'history.user2')
            ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
            ->select(   //Document
                        'documents.tracking_number as tracking_number',
                        'documents.doc_status as doc_status' ,
                        'documents.document_name as document_name',
                        'documents.document_id as document_id',
                        //Document Type
                        'document_types.type_name as type_name',
                        //User
                        'users.user_type as user_type',
                        //History
                        'history.received_date as received_date',
                        'history.history_id as history_id','history.remarks as remarks')
            ->where('user2', session('_id'))
            ->where('received_status', 1)
            ->where('release_status',NULL )
            ->where('status' , 'received')
            ->where('doc_status'  ,'!=', 'cancelled')
            ->where('doc_status'  ,'!=', 'outgoing')
            // ->where('documents.destination_type', 'complex')
            ->where('to_receiver' , 'no')
            ->orderBy('tracking_number', 'desc')->get();

        return $rows;

    }


    public static function get_forwarded_documents(){
        $row = DB::table('history as history')
             ->leftJoin('documents as documents', 'documents.tracking_number', '=', 'history.t_number')
             ->leftJoin('users as users', 'users.user_id', '=', 'history.user2')
             ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
             ->select(  //Document
                        'documents.tracking_number as tracking_number',
                        'documents.doc_status as doc_status' ,
                        'documents.document_name as document_name',
                        'documents.document_id as document_id',
                        //Documen Type
                        'document_types.type_name as type_name',
                        //History
                        'history.release_date as release_date',
                        'history.history_id as history_id',
                        'history.remarks as remarks',
                        //User
                        'users.user_id as user_id',
                        'users.user_type as user_type',
                        'users.first_name as first_name', 
                        'users.middle_name as middle_name', 
                        'users.last_name as last_name', 
                        'users.extension as extension',
                        DB::Raw("CONCAT(
                                        users.first_name, ' ', 
                                        users.middle_name , ' ', 
                                        users.last_name,' ',
                                        users.extension) as name"))
             ->where('user1', session('_id'))
             ->where('doc_status'  ,'!=', 'cancelled')
             ->where('received_status', NULL)
             ->where('status', 'torec')
             ->where('release_status',NULL )
             ->orderBy('tracking_number', 'desc')->get();

        return $row;
    }



    public static function get_outgoing_documents(){
        $row = DB::table('outgoing_documents as outgoing_documents ')
             ->leftJoin('documents as documents', 'documents.document_id', '=', 'outgoing_documents.doc_id')
            //  ->leftJoin('users as users', 'users.user_id', '=', 'outgoing_documents.user_id')
            //  ->select(  //Document
            //             'documents.tracking_number as tracking_number',
            //             'documents.doc_status as doc_status' ,
            //             'documents.document_name as document_name',
            //             'documents.document_id as document_id',
            //             //Documen Type
     
            //             //Outgoing
            //             // 'outgoing_documents.remarks as remarks',
            //             // 'outgoing_documents.outgoing_date as outgoing_date',
            //             //User
            //             'users.user_id as user_id',
            //             'users.user_type as user_type',
            //             'users.first_name as first_name', 
            //             'users.middle_name as middle_name', 
            //             'users.last_name as last_name', 
            //             'users.extension as extension',
            //  )
            //  ->where('outgoing_documents.user_id', session('_id'))
            //  ->where('outgoing_documents.status'  ,'!=', 'pending')
             ->get();
            //  ->orderBy('tracking_number', 'desc')

        return $row;
    }



    //FINAL RECEIVER QUERY
    public static function get_receiver_incoming_documents(){
        $row = DB::table('history as history')
            ->leftJoin('documents as documents', 'documents.tracking_number', '=', 'history.t_number')
            ->leftJoin('users as users', 'users.user_id', '=', 'history.user1')
            ->leftJoin('document_types as document_types', 'document_types.type_id', '=', 'documents.doc_type')
            ->select(   'documents.tracking_number as tracking_number',
                        'documents.document_name as document_name',
                        'documents.document_id as document_id',
                        'documents.note as note',
                        'users.user_type as user_type',
                        'document_types.type_name as type_name', 
                        'history.release_date as release_date',
                        'history.history_id as history_id',
                        'history.remarks as remarks', 
                        'users.first_name as first_name', 
                        'users.middle_name as middle_name', 
                        'users.last_name as last_name', 
                        'users.extension as extension',
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


    public static function search($search)
    {
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
                    'documents.document_description as document_description',
                    'documents.u_id as u_id',
                    //Document Types
                    'document_types.type_name',  
                    //User
                    'users.first_name as first_name', 
                    'users.middle_name as middle_name', 
                    'users.last_name as last_name', 
                    'users.extension as extension', 
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->where(DB::raw("concat(documents.document_name, ' ', documents.document_description)"), 'LIKE', "%" . $search . "%")
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;

    }

    public static function Adminsearch($search)
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
                    'history.remarks as remarks',
                    DB::Raw("CONCAT(users.first_name, ' ', users.middle_name , ' ', users.last_name,' ',users.extension) as name"))
        ->where(DB::raw("concat(documents.document_name, ' ', documents.document_description,' ', history.remarks)"), 'LIKE', "%" . $search . "%")
        ->orderBy('documents.document_id', 'desc')->get();

        return $rows;

    }


}
