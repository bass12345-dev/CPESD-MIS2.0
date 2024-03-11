<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonModel;

class SearchController extends Controller
{
    public function index(){

        $data['title']          = 'Search';
        return view('watchlisted.users.contents.search.search')->with($data);
    }

    public function search(Request $request)
    {
        $search = $request->input('first_name') . ' ' . $request->input('last_name');

        $users = PersonModel::search($search);
        return response()->json($users);
    }
}
