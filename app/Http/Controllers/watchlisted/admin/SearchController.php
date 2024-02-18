<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use App\Models\PersonModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index()
    {
        $data['title'] = 'Search';
        return view('watchlisted.admin.contents.search.search')->with($data);
    }

    public function search(Request $request)
    {
        $search = $request->input('first_name') . ' ' . $request->input('last_name');

        $users = PersonModel::search($search);
        return response()->json($users);
    }
}
