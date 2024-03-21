<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class RemovedController extends Controller
{
    private $person_table = 'persons';
    public function index(){

        $data['title']           = 'Removed';
        $data['approved']        = CustomModel::q_get_where_order($this->person_table,array('added_by' => session('watch_id'),'status'=>'inactive'),'created_at','desc')->get();
        return view('watchlisted.users.contents.removed.removed')->with($data);
    }
}
