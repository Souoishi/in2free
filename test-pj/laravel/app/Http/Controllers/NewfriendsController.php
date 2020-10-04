<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewfriendsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userid = auth()->user()->id;
        $users = \App\User::all();
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // compact do the exactly same thing as we did in auth->user->posts()->create...
        return view('shared.newfriends', compact('user', 'users', 'userid', 'follows'));
    }
}
