@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-3 p-5">
            <img src="{{ asset($user->profile[0]->profileImage()) }}" class="rounded-circle w-100" >
       </div>
       <div class="col-9 pt-5">
       <!--what are you doing now is same as user.username in js-->
        <div class='d-flex justify-content-between align-items-baseline'>
            <div class="d-flex align-item-center pb-3">
                <div class="h4">{{ $user->username }}</div>
                <follow-b user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-b> 
            </div>

        

        </div>
        <!--can here works exactly as authorize on ProfileController-->
        @can('update', $user->profile[0])
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
        @endcan
        <div class="d-flex">
            <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
            <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
            <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
        </div>
        <div class="pt-4 font-weight-bold">{{ $user->profile[0]->title}}</div>
        <div>{{ $user->profile[0]->description }}</div>
        <div><a href="#">{{ $user->profile[0]->url }}</a></div>

       </div>
   </div>   
   <!--<div class="row pt-4">-->
    
   <div class="text-center">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading"> Word list </h4>
            </div>
    </div>
        
    

   <div class="container" style="display:flex; flex-direction:column; justify-content: center;">
       
        <input id="cards-of-user" style="display:none;" value="{{ $user->posts }}">
        <div id="words-forums" class="words-forums"></div>
            <!--@foreach($user->posts as $post)
                
                <post-card post_info="{{ $post }}" page="profile"></post-card>
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        
                        <img src="/storage/{{ $post->image }}" class="w-100">
                        sort this in order of updated_at

                        <p>Caption</p>
                        <p>{{ $post->caption }}</p>
                        <p>Short-blog</p>
                        how to limit the number of words and put ... at the end
                        <p>{{ $post->short_blog }}</p>
                    </a>
                </div>
            
            @endforeach-->
       
   </div>
    

   <div class="text-center">

        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading"> Outline list </h4>
        </div>
        
    </div>

   <div class="container" style="display:flex; flex-direction:column; justify-content: center;">
   
        <input id="topic-catalog" style="display:none;" value="{{ $Topics }}">
        <input id="outlines-of-user" style="display:none;" value="{{ $user->outlines }}">
        <div id="outline-forums-user" class="outline-forums-user"></div>
            <!--@foreach($user->posts as $post)
                
                <post-card post_info="{{ $post }}" page="profile"></post-card>
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        
                        <img src="/storage/{{ $post->image }}" class="w-100">
                        sort this in order of updated_at

                        <p>Caption</p>
                        <p>{{ $post->caption }}</p>
                        <p>Short-blog</p>
                        how to limit the number of words and put ... at the end
                        <p>{{ $post->short_blog }}</p>
                    </a>
                </div>
            
            @endforeach-->
       
   </div>
</div>
@endsection
