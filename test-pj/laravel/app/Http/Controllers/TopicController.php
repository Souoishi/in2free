<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Topic;

class TopicController extends Controller
{
    public function store(Request $request)
    {
        
        $topic = $request->input('topic');
        $category = $request->input('category');
        

        DB::table('debate_topics')->insert(
            ['topic' => $topic, 'category' => $category]
        );
        

        return view('shared.topiccatalog');
    }

    public function index()
    {
        // $user = $user::all();
        $topiccatalog =  \App\Debate_topics::all();
        
        $outlines =  \App\Outline::all();
        
        
        
        // compact do the exactly same thing as we did in auth->user->posts()->create...
        return view('shared.topiccatalog', compact('topiccatalog', 'outlines'));
    }
}
