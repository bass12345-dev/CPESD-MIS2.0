<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\PersonModel;
use Illuminate\Http\Request;

class ViewProfileController extends Controller
{
    public $person_table            = 'persons';
    public $programs_table          = 'programs';
    public $programs_block_table    = 'program_block';
    public $records_table           = 'records';
    public $now;
    public function __construct()
    {
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {   
        $id = $_GET['id'];
        $data['title']              = 'View Profile';
        $data['person_data']        = PersonModel::get_person_profile($id);
        $data['programs']           = $this->get_programs();
        $data['person_programs']    = $this->get_person_programs($data['programs']);   
        $data['records']            = $this->get_records();
        $data['barangay']           = config('app.barangay');
        return view('watchlisted.admin.contents.view_profile.view_profile')->with($data);
    }


    function get_person_programs($data){

        $item = [];

        foreach ($data as $row) {
            
            if ($row['x'] == true) {
                
                array_push($item,$row['program']);
            }
        }

        return $item;

    }

     public function get_programs(){


        $items              = CustomModel::q_get_order($this->programs_table,'program','asc')->get();
        $person_id          = $_GET['id'];

        $data               = [];

        foreach ($items as $row) {

            $program_id     = $row->program_id;

            $x = CustomModel::q_get_where($this->programs_block_table,array('person_id' => $person_id,'program_id' => $program_id))->count();
            $data[]         = array(

                                    'program'       => $row->program,
                                    'program_id'    => $row->program_id,
                                    'x'             => $x == 1 ? true : null
            );
        }


        return $data;


 }


     public function get_records(){

        $data = [];
        $items = CustomModel::q_get_where($this->records_table,array('p_id' => $_GET['id']))->get();
        foreach ($items as $row) {
            
            $data[] = array(

                    'created_at'            => date('M d Y - h:i a', strtotime($row->created_at)),
                    'record_description'    => $row->record_description,
                    'p_id'                  => $row->p_id,
                    'record_id'             => $row->record_id

            );
        }
      return $data;
    }


}
