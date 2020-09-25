<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GraphController extends Controller
{
    public function graph() {
        return View::make('graph');
    }
}
