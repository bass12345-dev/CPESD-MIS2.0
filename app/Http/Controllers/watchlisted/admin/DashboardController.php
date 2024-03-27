<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $person_table = 'persons';
    public $programs_table = "programs";
    public function index(){
        $data['title']                  = 'Watchlisted Dashboard';
        $data['gender_title']           = 'Count Active By Gender';
        $data['count']   = $this->count_all();

       
        return view('watchlisted.admin.contents.dashboard.dashboard')->with($data);
    }

    function count_all(){
        $data           = [];
        $active         = CustomModel::q_get_where($this->person_table,array('status' => 'active'))->count();
        $inactive       = CustomModel::q_get_where($this->person_table,array('status' => 'inactive'))->count();
        $to_approve     = CustomModel::q_get_where($this->person_table,array('status' => 'not-approved'))->count();
        $programs       = CustomModel::q_get($this->programs_table)->count();
        $active_male    = CustomModel::q_get_where($this->person_table,array('status' => 'active','gender'=> 'male'))->count();
        $active_female    = CustomModel::q_get_where($this->person_table,array('status' => 'active','gender'=> 'female'))->count();
        $data         = array(
                                'active'            => $active , 
                                'inactive'          => $inactive,
                                'to_approve'        => $to_approve,
                                'programs'          => $programs,
                                'total_male'        => $active_male ,
                                'total_female'        => $active_female 
                            );
        return  $data;
    }

    public function data_per_barangay(){


        $active     = array();
        $to_approved = array();
        $removed = array();
        $barangay   = config('app.barangay');

        foreach ($barangay as $row) {

            $count = CustomModel::q_get_where($this->person_table,array('status' => 'active', 'address' => $row))->count();
            array_push($active, $count);

            $count1 = CustomModel::q_get_where($this->person_table,array('status' => 'not-approved', 'address' => $row))->count();
            array_push($to_approved, $count1);

            $count3 = CustomModel::q_get_where($this->person_table,array('status' => 'inactive', 'address' => $row))->count();
            array_push($removed, $count3);

        }


        $data['label'] = $barangay;
        $data['active'] = $active;
        $data['to_approved'] = $to_approved;
        $data['removed'] = $removed;

        return response()->json($data);
    }
}
