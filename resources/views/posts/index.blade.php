@extends('layouts.app')

@section('content')

<div class="container">

    @foreach($posts as $post)
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3"> 
                    <p>
                        <span class="font-weight-bold"> 
                        <a href="/profile/{{ $post->user->id }}"> 
                            <span class="text-dark"> {{ $post->user->username }} </span> 
                        </a>
                        <br>
                        <h3>{{ $post->caption }}</h3>
                    </p>

            </div>

        </div>
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/profile/{{ $post->user->id }}">
                <p> {{ $post->short_blog }} </p>
                    <!--<img src="/storage/{{ $post->image }}" class="w-100">-->
                </a>
            </div>
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