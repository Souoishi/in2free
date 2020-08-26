@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-3 p-5">
            <img src="{{ $user->profile[0]->profileImage() }}" class="rounded-circle w-100" >
       </div>
       <div class="col-9 pt-5">
       <!--what are you doing now is same as user.username in js-->
        <div class='d-flex justify-content-between align-items-baseline'>
            <div class="d-flex align-item-center pb-3">
                <div class="h4">{{ $user->username }}</div>
                <follow-b user-id="{{ $user->id }}" follows="{{ $follows }}"/> 
            </div>

        @can('update', $user->profile[0])
            <a href="/p/create">Add New Post</a>
        @endcan

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
        <div><a href="#">{{ $user->profile[0]->url }}</div>

       </div>
   </div>   
   <div class="row pt-4">
       
        @foreach($user->posts as $post)

            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    
                    <!--<img src="/storage/{{ $post->image }}" class="w-100">-->
                    <p>{{ $post->short_blog }}</p>
                </a>
            </div>
          
        @endforeach
   </div>
</div>
@endsection
