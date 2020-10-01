@extends('layouts.app')

@section('content')

<div class="video-container">
    <h1 class="debate-wating-room title"> Practice your speaking </h1>

        <!-- video-chat screen -->
    <div class="time-zone">
        <p id="RealtimeClockArea" class="border-bottom"></p><!--#3b7ea1   #fdb515-->
                <button id ='start' type="button" class="btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px">Fire up</button>
                <button id ='stop' type="button" class="btn btn-primary" style="background: #C4820E; border-color:#C4820E; color:white">Stop</button>
        <!-- header -->
        <div class="topic-box">
            

            <div class="card-body">
                <input id="topic" value="{{$debateTopics[$randomIndex]['topic']}}" style="display:none">
                <input id="topicInd" value="{{ $randomIndex + 1}}" style="display:none">
                <h1 id="topic-display" class="card-title border-bottom"></h1>
                <!-- TOPIC : {{$debateTopics[$randomIndex]['topic']}} -->
                <p class="card-text">
                Category: {{$debateTopics[$randomIndex]['category']}}<br>
                </p>
            </div>
        </div>
    </div>

    <div class="debate-grid">



        
        

            <!-- /side -->
      


                   


         <!-- Dictation -->
         {{--  大枠  --}}
            <div class="voice-output">
                <div class="col-md-10 border border-secondary round">
                    <h5 class="border-bottom">Dictation</h5>
                    {{--  出力先  --}}
                    <div id="content" class="box-voice-output"></div>
                </div>

                {{--  出力  --}}
                <div id="result"></div>
                <div id="text-button" class="btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515">download</div>
                <!-- /Dictation -->
            </div>

            <!-- side:topic-box -->

            





    
<div id="friends-box" class="friends-box">


    <!--<profile-card :users="{{ $user }}" >
    <profile-card/>-->

    @foreach($users as $user)
    <!--嘘！！！ちゃんとここにも自分のカード出す！自分のユーザーIDを持ってるカードに、自分のIDをいれる！但し、CSSは隠す　display:none;-->
        @if ($user->id !== $userid)
        <div class="card">
            <div class="card-header">
                <a href="/profile/{{ $user->id }}" >
                    <span class=“text-dark”> {{ $user->username }} </span>
                    @if($user->isOnline())
                    
                        <li class="text-success">
                            Online
                        </li>
                    @else
                    
                        <li class="text-muted">
                            Offline
                        </li>
                    @endif
                </a>
            </div>
            <div class="">
                <div class="d-flex">
                    <img src="{{ $user->profile[0]->profileImage() }}" class="rounded-circle" style="width: 10rem; margin:1rem;">

                    <div class="card-body">
                        <h5 class="card-title"> Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                        <div style="display:flex;">
                            <follow-b user-id="{{ $user->id }}" follows="{{ $follows }}"> </follow-b>
                            <!--ここでボタン伝いでskaywayidを渡したい！-->
                            <!--make-call-->
                            <!--my-id.value should be assigned to value -->
                            <!--in script.js, get the value , then insert it into value of thier-id-->
                            <button id="make-call" 
                                type="button" 
                                class="btn btn-success" 
                                style="margin-left: 10px; background: #3b7ea1; border-color:#3b7ea1; color:#fdb515;" 
                                value="{{ $user->id }}"
                                onclick='(function(){
                                    console.log({{ $user->id }})
                                    $("#friends-box").hide()
                                    $("#outline-box").show()
                                })()'
                                >Make call</button>
                        </div>

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
<!--int_debate button を押した後、以下のoutlineを出す-->


<div id="outline-box" class="outline-box" style="display:none">
<div class="jumbotron">
    <h1 class="col-sm-10"> Create your Outline </h1>

            
    <form action="/outline" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group row">
            <!--topic id-->
        <input type="number" class="form-control form-control-lg" id="dbtopic_id" name="dbtopic_id">
            <label for="inputPassword" class="col-sm-2 col-form-label">Take position</label> <span>
            <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="position" name="position">
                    <option selected>Choose...</option>
                    <option value="Agree">Agree</option>
                    <option value="Disagree">Disagree</option>
                    <option value="Middle">Middle</option>
                </select>
            </div>
            </span>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Thesis statement</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="thesis" name="thesis" placeholder="Your thesis here">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">support 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="support1" name="support1" placeholder="reason or example">
                <textarea rows="4" style="margin-top: 10px;" cols="50" id="detail1" name="detail1"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">support 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="support2" name="support2" placeholder="reason or example">
                <textarea rows="4" style="margin-top: 10px;" cols="50" id="detail2" name="detail2"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">support 3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="support3" name="support3" placeholder="reason or example">
                <textarea rows="4" style="margin-top: 10px;" cols="50"  id="detail3" name="detail3" ></textarea>
            </div>
        </div>
        <button class="btn btn-primary">Add New Post</button>
    </form>
   
    
</div>
</div>

<div id="thesis-card" class="thesis-card">
    <div class="jumbotron">
        <h1 class="col-sm-10"> Create your thesis </h1>

       
            
    <form>
        <div class="form-group row">
        
            <label for="inputPassword" class="col-sm-2 col-form-label">Take position</label> <span>
            <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="position2" >
                    <option selected>Choose...</option>
                    <option value="Agree">Agree</option>
                    <option value="Disagree">Disagree</option>
                    <option value="Middle">Middle</option>
                </select>
            </div>
            </span>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Thesis statement</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="thesis2" placeholder="Your thesis here">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">support 1</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="support11"  placeholder="reason or example">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">support 2</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="support22"  placeholder="reason or example">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">support 3</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="support33" placeholder="reason or example">
            </div>
        </div>
    </form>
    </div>
    
</div>

</div>

@endsection
