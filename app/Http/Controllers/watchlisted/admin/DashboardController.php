<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $person_table = 'persons';
    public function index(){
        $data['title'] = 'Watchlisted Dashboard';
        $data['count_active'] = $this->count_all();
        return view('watchlisted.admin.contents.dashboard.dashboard')->with($data);
    }

    function count_all(){
        $data           = [];
        $active         = CustomModel::q_get_where($this->person_table,array('status' => 'active'))->count();
        $inactive       = CustomModel::q_get_where($this->person_table,array('status' => 'inactive'))->count();
        $data[]         = array('active' => $active , 'inactive' => $inactive);
        return response()->json($data);
    }

    public function data_per_barangay(){


        $active     = array();
        $barangay   = config('app.barangay');

        foreach ($barangay as $row) {

            $count = CustomModel::q_get_where($this->person_table,array('status' => 'active', 'address' => $row))->count();
            array_push($active, $count);

        }


        $data['label'] = $barangay;
        $data['active'] = $active;

        return response()->json($data);
    }
}
