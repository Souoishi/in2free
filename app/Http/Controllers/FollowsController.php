<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{

    public function __construct()
    {
        // by this, checking the user is authorized(logged in) or not
        // change the type of error so as to be cought as an error  on Frontend (view)
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        // toggel method
        // this user() && $user are different 
        //user() -> authentificated user (from login )
        // $user comes from param of store
        // the $user is attached to profile 
        
        return auth()->user()->following()->toggle($user->profile);
        
        
    }
}
