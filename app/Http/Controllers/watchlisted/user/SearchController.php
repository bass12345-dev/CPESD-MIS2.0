<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){

        $data['title']          = 'Search';
        return view('watchlisted.users.contents.search.search')->with($data);
    }
}
