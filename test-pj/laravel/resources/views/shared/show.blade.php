@extends('layouts.app')

@section('content')
    
<div class="container">


    <!--<profile-card :users="{{ $user }}" > 
    <profile-card/>-->
    
    @foreach($users as $user)
        @if($user->id !== $userid)
        <div class="card" style="margin:5rem;">
            <div class="card-header">
                <a href="/profile/{{ $user->id }}" > 
                    <span class=“text-dark”> {{ $user->username }} </span> 
                </a>
            </div>
            <div class="">
                <div class="d-flex"> 
                    <img src="{{ $user->profile[0]->profileImage() }}" class="rounded-circle" style="width: 10rem; margin:1rem;">
                    
                    <div class="card-body">
                        <h5 class="card-title"> Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <follow-b user-id="{{ $user->id }}" follows="{{ $follows }}"/> 
                    </div>
                </div>
            </div>
        </div>

        @endif

    @endforeach
        

    <div class="row">
   
        <div class="col-12 d-flex justify-content-center">
            <!--$user->links-->
        </div>

    </div>
</div>

@endsection


