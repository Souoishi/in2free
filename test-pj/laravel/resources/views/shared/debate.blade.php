@extends('layouts.app')

@section('content')

<div class="video-container">
    <h1> Wating room for discussion </h1>

        <!-- video-chat screen -->
        <header>
            <ul>
            <li><p>My Room ID : <span id="my-id"></span></p></li>
            <li><input id="their-id" class="form-control" placeholder="IDを入力してください"></li>
            <li><button id="make-call" class="btn btn-outline-primary">Enter</button></li>
            <li><button id="end-call" class="btn btn-outline-secondary">Leave</button></li>
            </ul>
        </header>
        <!-- header -->

    <div class="debate-grid">


        <div class="main-video col-md-7">
                    <!-- Live Video-main -->
                    <video id="my-video" width="100%" height="20%" autoplay muted playsinline></video>

                    <!-- Live Video-sub -->
                    <div class="video-2 col-md-3">
                        <div class="box"><video id="my-video2" width="100%" height="70%" autoplay muted playsinline></video></div>
                    </div>
                    <!-- Live Video -->



                    <!-- Dictation -->
                    {{--  大枠  --}}
                    <div class="col-md-10 border border-secondary round">
                        <h5 class="border-bottom">Dictation</h5>
                        {{--  出力先  --}}
                        <div id="content" class="box-voice-output"></div>
                    </div>

                    {{--  出力  --}}
                    <div id="result"></div>
                    <div id="text-button" class="btn btn-primary">クリック</div>
                    <!-- /Dictation -->



        </div>


                <!-- side:topic-box -->

                <div class="topic-box">
                    <p id="RealtimeClockArea" class="border-bottom"></p>
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Talk theme</h5>
                        <p class="card-text">
                        What do you think about xxx?<br>
                        Agree or Disagree <br>
                        e.g.</p>
                    </div>
                </div>

                <!-- /side -->






<div class="friends-box">


    <!--<profile-card :users="{{ $user }}" >
    <profile-card/>-->

    @foreach($users as $user)
        @if($user->id !== $userid)
        <div class="card">
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
</div>

@endsection
