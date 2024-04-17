<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddDocumentController extends Controller
{
    private $document_types_table       = "document_types";
    private $user_table                 = "users";
    private $office_table               = "offices";
    private $documents_table            = 'documents';
    public function index(){

     
        $data['title']          = 'Add Document';
        $data['document_types'] = CustomModel::q_get_order($this->document_types_table,'type_name','asc')->get(); 
        $data['user_data']      = CustomModel::q_get_where($this->user_table,array('user_id' => session('_id')))->first();
        $data['offices']        = CustomModel::q_get_order($this->office_table,'office','asc')->get(); 
        
        return view('dts.users.contents.add_document.add_document')->with($data);
    }

    public function get_documents_limit(){
        $items = DocumentsModel::get_all_documents_with_limit(10);
        $i = 1;
        foreach ($items as $value => $key) {
            $data[] = array(
                'number'            => $i++,
                'document_name'     => $key->document_name,
                'name'              => $key->first_name.' '.$key->middle_name.' '.$key->last_name.' '.$key->last_name,
                'document_number'   => $key->tracking_number
                
            );
        }
        
        return response()->json($data);
    }

    public function get_last(){

        #define tracking number variable
        $tracking_number = '';
        #count documents added in database
        $verify = DB::table('documents')->count();
        #get current year
        $current_year = Carbon::now()->format('Y');
        #ymd format = Year Month Day
        $ymd_format = Carbon::now()->format('Ymd');

        #CONDITION

        #check if there is document added in database
        if($verify) {
            #get last added in database
            $last_created = date('Y', strtotime( DB::table($this->documents_table)->orderBy('created', 'desc')->first()->created));
             #current year is greater than the last year added
            if($current_year > $last_created )
                {      
                    #set tracking number to 001
                     $tracking_number = $ymd_format.'001';
                #current year is less than the last year added
                }else if ($current_year < $last_created) {
                    #get last created and then add 1
                    $tracking_number = DB::table($this->documents_table)
                                        ->whereRaw("YEAR(documents.created) = '".Carbon::now()->format('Y-m-d')."' ")
                                        ->orderBy('created', 'desc')
                                        ->first()->tracking_number +  1;
                #current year is equal in last year added                       
                }else if (Carbon::now()->format('Y') === $last_created){
                    #get last three digits
                    $last_digits = $this->last_digits() + 1;
                    $tracking_number = $ymd_format.$this->put_zeros($last_digits);
                }
        }else {
            $tracking_number = $ymd_format.'001';
        }
        return $tracking_number;
    }


    function last_digits() { 

        $number = DB::table($this->documents_table)
                    ->whereRaw("YEAR(documents.created) = '".Carbon::now()
                    ->format('Y')."' ")
                    ->orderBy('created', 'desc')
                    ->first()
                    ->tracking_number;
        //get digits after year month date format
        $number = substr($number,8,8);
        return $number;
        

        #Last Method in getting last three digits

        // $arr = str_split($number); 
        // $lastThirdDigit = $arr[sizeof($arr)-3]; 
        // $lastSecondDigit = $arr[sizeof($arr)-2]; 
        // $lastDigit = $arr[sizeof($arr)-1]; 

        // return $lastThirdDigit.$lastSecondDigit.$lastDigit;
        
    } 

    function put_zeros($last_digits){

        $tracking_number = '';
        
        switch ($last_digits) {
            case $last_digits < 10:
                $tracking_number = '00'.$last_digits;
                break;
            case $last_digits < 100:
                $tracking_number = '0'.$last_digits;
                break;
            default:
                $tracking_number = $last_digits;
                break;
        }

        return $tracking_number;

    }
}
