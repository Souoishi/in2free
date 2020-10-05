@extends('layouts.app')

@section('content')

<div class="container">
    <div class="journal-page-title">
        <h1>Share your English journal</h1>
    </div>
    @foreach($posts as $post)
        <div class="row pt-2 pb-4">
            <div class="col-10 offset-1"> 
                
            <post-card post_info="{{ $post }}" prof_img="{{$post->user->profile[0]->profileImage()}}" page="sns" username="{{ $post->user->username }}" userid="{{ $post->user->id }}"></post-card>
                    <!--<img src="/storage/{{ $post->image }}" class="w-100">-->
            </div>
        </div>

    
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>

    </div>
</div>

@endsection