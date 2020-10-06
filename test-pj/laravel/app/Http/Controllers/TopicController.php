<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Debate_topics;

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

    public function show(Debate_topics $debate_topics) 
    {
        $outlines =  \App\Outline::all();
        $users = \App\User::all();
        // compact do the exactly same thing as we did in auth->user->posts()->create...
        return view('shared.showoutline', compact('debate_topics', 'outlines','users'));
    }

    public function custom(Debate_topics $debate_topics) {
        $whichPage = request('whichPage');
        
        
        $whichPage = "selected";
        $selected_category = $debate_topics->category;
        $debateTopics = $debate_topics->topic;
        
        $randomIndex = $debate_topics->id;
       
        $userid = auth()->user()->id;
       
        $users = \App\User::all();
        $user = auth()->user();
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        return view('shared.debate', compact('userid','follows','users','user','debateTopics', 'whichPage','randomIndex','selected_category'));
    }
}
