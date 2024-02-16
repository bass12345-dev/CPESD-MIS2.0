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



    public static function get_document_data($tn){
        $row = DB::table('documents')->where('tracking_number', $tn)->leftJoin('document_types', 'document_types.type_id', '=', 'documents.doc_type')->leftJoin('users', 'users.user_id', '=', 'documents.u_id')->leftJoin('offices', 'offices.office_id', '=', 'documents.offi_id')->get()[0];
        return $row;
    }


    public static function get_history($tn){
        $row = DB::table('history')->where('t_number',$tn)->leftJoin('final_actions', 'final_actions.action_id', '=', 'history.final_action_taken');
        return $row;
    }

    public static function  history_user_data($where){
        $row =  DB::table('users')->where($where)->leftJoin('offices', 'offices.office_id', '=', 'users.off_id')->get();
        return $row;
    }

    //User Query
}
