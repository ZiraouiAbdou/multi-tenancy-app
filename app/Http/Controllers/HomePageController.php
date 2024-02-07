<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    //
    public function index(Request $request)
    {
        $host = $request->getHost();

        dd(DB::table('categories')->get()->toArray());
        return view('welcome', compact('host'));
    }
}
