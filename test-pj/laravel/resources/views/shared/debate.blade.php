@extends('layouts.app')

@section('content')
<div class="video-container">

    <h1> Wating room for discussion </h1>
    
        <!-- video-chat screen -->
        <header>
            <ul>
            <li><p>My Room ID : <span id="my-id"></span></p></li>
            <li><textarea id="their-id" placeholder="IDを入力してください"></textarea></li>
            <li><button id="make-call">入室 これいらないボタン</button></li>
            <li><button id="end-call">退室</button></li>
            </ul>
        </header>
        <!-- header -->

    <div class="debate-grid">
        

           
                
                <!-- Live Video-main -->
                <div class="main-video col-md-7">
                    <video id="my-video" width="100%" height="100%" autoplay muted playsinline></video>
                     
                    <!-- Live Video-sub -->
                    <div class="video-2 col-md-3">
                        <div class="box"><video id="my-video2" width="100%" height="100%" autoplay muted playsinline></video></div>
                    </div>
                <!-- Live Video -->
                
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
            
               
                    <!-- 言葉文字起こし -->
                    <!-- <div id="content"></div> -->
                <div class="box-voice-output">

                    
                </div>
                    <div class="col-md-4" id="outline">
                    <!--/言葉文字起こし -->

                        <div class="dication col-md-4 order-md-1 mb-4">
                            <ul class="list-group mb-3">
                            <li class="list-group-item d-flex">
                                <h6>Dictation</h6>
                            </li>
                            <li class="list-group-item d-flex">
                                <div class="w-75 text-left"><div id="content"></div></div>

                            </li>
                            </ul>
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


