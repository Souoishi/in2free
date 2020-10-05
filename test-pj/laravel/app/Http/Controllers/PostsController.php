<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // by adding this, all the store , create functions require auth to work 
    // if you do not sign in , you can not see any page
    // this is auth check 
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // this finds out the users that the authenticated user (logging in now) follows 
        // pluck helper method is used to retrieve a list of specific values from a given $array.
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $usersPicture = auth()->user()->following()->pluck('profiles.image');
        // Laravel provide wherein() to use sql wherein query. in wherein() we just need to pass two argument one is column name and another if array of ids or anything that you want.
        // shows all posts that the users the authenticated user following have posted
        // to order all post from latest one , adding order by = latest()
            //with ('user')<- talking about relationship
            // when you loadig all over whereIn(), wanna load with "realtionship" with user that POST models has inside by itself
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        
        return view('posts.index', compact('posts','users','usersPicture'));
    }


    


    public function store()
    {
        // here validate all the given data from the form
        // inside of this func, put all obj-key you wanna validate e.g. required 
        
        
    
        // $data = request()->validate([
        //     'caption' => 'required',
        //     'line' => 'required'
        

        // ]);
        // STORE func of Upload func:
        // image is instance of "uploadfile", which has lot a function, we use store function from it
        // the 1st parm is the path (directry) where you wanna store, 2nd parm is which DRIVER you wanna use to store
            // 'public'-> our local storage
        // end up getting path to the image    
        // $imagePath = request('image')->store('uploads', 'public');

        // // after you add composer require intervention/image
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        // $image->save();


        // we need to save user_id here to fit to post table structure on the migration file
        // we ganna save it by make use of relation 
        // auth has it, and auth has user fnuct inside of it, user func has posts func inside 
        // you can see all the reation at User model.php
        // the data also has the above data structure
        // onece you establish the realition, it will automatically inheret the id, as laravel knows it
        // why you can get user_id correctly? cus auth get only authentificated user
        // this below funcs are MODEL. 
        auth()->user()->posts()->create([
            'jp_expression' => request('jp_expression'),
            'eg_expression' => request('eg_expression'),
            'topic_id' => request('topic_id'),
            'card_topic' => request('card_topic'),
            'exmp' => request('exmp')
        ]);

        $whichPage = request('wordwhichPage');
        $debateTopics = request('wordDammyTopic');
        $randomIndex = request('wordDammyTopicId');
        $selected_category = request('wordDammyCateg');
        
        $userid = auth()->user()->id;
        $users = \App\User::all();
        $user = auth()->user();
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;


 
            // ここでdebate に戻す！　with all posts of the user
        //return view('shared.debate',compact('userid','follows','users','user','selected_topic', 'whichPage','indexOfTopic','selected_category'));
        return view('shared.debate',compact('user', 'users', 'userid', 'follows', 'debateTopics', 'randomIndex', 'whichPage','selected_category'));
    }
    // before you put \App\Post , the $post just get "getvalue on browser (id) from index.blade.php"
    // But once you put them, $post FETCH post function (model) that automatically fetch attributes
    public function show(\App\Post $post) 
    {
        // compact do the exactly same thing as we did in auth->user->posts()->create...
        return view('posts.show', compact('post'));
    }



}
