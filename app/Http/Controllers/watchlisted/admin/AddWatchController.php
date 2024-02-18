<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddWatchController extends Controller
{
     public function index(){
        $data['title'] = 'Add';
        $data['barangay']   = config('app.barangay');
        return view('watchlisted.admin.contents.add.add')->with($data);
    }
}
