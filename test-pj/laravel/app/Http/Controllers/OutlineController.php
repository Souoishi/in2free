<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outline;
class OutlineController extends Controller
{
    public function store()
    {
        // here use User as a main table , but atart with auth
        // cus only auth can indentify who is THIS user
        // we nedd THE user_id
        // then we insert it into online model 
        // then we need to use create function that is embeded in outline Model 
        auth()->user()->outlines()->create([
            'dbtopic_id' => request('dbtopic_id'),
            'position' => request('position'),
            'thesis' => request('thesis'),
            'support1' => request('support1'),
            'detail1' => request('detail1'),
            'support2' => request('support2'),
            'detail2' => request('detail2'),
            'support3' => request('support3'),
            'detail3' => request('detail3')
        ]);
        

        
        


        // $outlineinfo->dbtopic_id = request('dbtopic_id');
        // $outlineinfo->position = request('position');
        // $outlineinfo->thesis = request('thesis');
        // $outlineinfo->support1 = request('support1');
        // $outlineinfo->detail1 = request('detail1');
        // $outlineinfo->support2 = request('support2');
        // $outlineinfo->detail2 = request('detail2');
        // $outlineinfo->support3 = request('support3');
        // $outlineinfo->detail3 = request('detail3');
        //dd($outlineinfo);
        //return redirect('/profile/'. auth()->user()->id );
        return view('posts.create');
    }
        
    
}
