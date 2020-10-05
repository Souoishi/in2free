<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // is you authenticated user's followings, <- does that contain the user that got passed in above? 
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        // using cache , need to use($user) to have access to $user
        $postCount = Cache::remember(
            // this is the key count.posts user_id
            'count.posts'. $user->id, 
            // we ganna store it for now + 30 sec // after 30 sec since you loaded the count, then you set it again by using the return 
            now()->addSeconds(30), 
            // if it is not there (if cache is not available, we just run the below)
            function () use($user) {
                return $user->posts->count();
        });
        
        $followersCount = Cache::remember(
            'count.followers'. $user->id,
            now()->addSeconds(30), 

            function () use($user) {
                return $user->profile[0]->followers->count();
        });


        $followingCount = Cache::remember(
            'count.following'. $user->id,
            now()->addSeconds(30), 
            function () use($user) {
                return $user->following->count();
        });



        $Topics =  \App\Debate_topics::all();

        // to get actuall user data, we need lines below:
        // User -> model and fetching User data with THE keyword $user
        // if you put profile/1 on browser as $user, then if your db has the user number,
        // it returns the user row 
        // this find method is used in tinker to grab value from a table
            //$user = User::findOrfail($user);
        // here we pass $user into home.php as attribute
        // on the ./view/home.php, you can recive the $user in {{}} 
        // you recive user from varuable of index, then pass it to $user
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount','Topics' ));
        // you can use compact here 
            //return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        // means, we authorize 'update function' ON this user's profile info
        // authorize gives user->profile obj into update function IN ProfilePolicy,
        // in update func in PPolicy return boolean val, if it is true, it excute the line below
        // then return edit profile page, but if it is false, it returns "403 this action is unauthorized"
        $this->authorize('update', $user->profile[0]);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile[0]);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
        //dd($user->profile);
        // this is extra protection. if the user are not authentificated and logged in, he/she cannot edit this
        // but this is not enough, even the edit_profile should not be appear for strangers 
        // we need policy -> php artisan 
            // php artisan make:policy ProfilePolicy -m Profile
            // you will get Policies folder in app
        
        // means if there is new image from the data you get from edit page submition
        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');

            // after you add composer require intervention/image
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            
            // added at 3:18:54
            // this image key being set to imagepath happens, ONLY when you hvae IMAGE
            // therefore, any elem in data are not overidden  
            $imageArray = ['image' => $imagePath ];
        } 

        // trick: "array_merge" takes any num of arraies, it appends them together
        auth()->user()->profile[0]->update(array_merge(
            // data is from above data array
            // the second line says, 'image'(key)->'$imagepath'(valu)
            // and the new key & value is override the exited "value" of image 
            $data,
            $imageArray ?? []
        ));
            

        return redirect("/profile/{$user->id}");
        
    }

    public function show(User $user)
    {
        // $user = $user::all();
        $whichPage = "random";
        $Topics =  \App\Debate_topics::all();
        $numOfTopics = count($Topics);
        $randomIndex = rand(0, $numOfTopics);
        $Topics = $Topics[$randomIndex];
        
        $debateTopics = $Topics['topic'];
        $selected_category = $Topics['category'];
        $userid = auth()->user()->id;
        $users = \App\User::all();
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // compact do the exactly same thing as we did in auth->user->posts()->create...
        return view('shared.debate', compact('user', 'users', 'userid', 'follows', 'debateTopics', 'randomIndex', 'whichPage','selected_category'));
    }
}
