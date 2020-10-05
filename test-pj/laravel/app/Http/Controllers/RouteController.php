<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {   
        $userid = auth()->user()->id;

        return view('welcome', compact('userid'));
    }

    
}
