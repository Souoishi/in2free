@extends('layouts.app')

@section('content')
@if ($whichPage === "random")
<div class="video-container" >
    <input id="which-page" value="{{$whichPage}}" style="display:none">
    <h1 class="debate-wating-room title">  </h1>

    
    <!--<button id ='start-practice' type="button" class="btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px">Start practice</button>-->
        <!-- video-chat screen -->
    <div id="time-zone" class="time-zone" >
        <p id="RealtimeClockArea" class="border-bottom"></p><!--#3b7ea1   #fdb515-->
                <button id ='start' type="button" class="btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px">Fire up</button>
                <!--<button id ='stop' type="button" class="btn btn-primary" style="background: #C4820E; border-color:#C4820E; color:white">Stop</button>-->
        <!-- header -->
        <div class="topic-box">
            

            <div id="card-body" class="card-body">
                <input id="topic" value="{{$debateTopics}}" style="display:none">
                
                <h1 id="topic-display" class="card-title border-bottom"> </h1>
                <input id="topicInd" value="{{ $randomIndex + 1}}" style="display:none">
                
                <input type="text" id="category" name="category" value="{{$selected_category}}" style="display:none;">
                <p class="card-text">
                Category: {{$selected_category}}<br>
                </p>
            </div>
            <button id ='try-again' type="button" class="btn btn-primary" style="background: #C4820E; border-color:#C4820E; color:white">Try again</button>
            <a id="next-topic" 
                role="button" 
                class="btn btn-primary" 
                href="{{url('/shared', [$user->id])}}" 
                style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px"
                onclick='(function(){
                    localStorage.removeItem("topicInd")
                    localStorage.removeItem("phaseInd")
                })()'
            >Go to next topic</a>
        </div>
    </div>

    
@else
    <div class="selected-video-container">
    <input id="which-page2" value="{{$whichPage}}" style="display:none">
        <h1 class="debate-wating-room title">  </h1>

            <!-- video-chat screen -->
        <div id="selected-time-zone" class="time-zone" >
            <p id="RealtimeClockArea" class="border-bottom"></p><!--#3b7ea1   #fdb515-->
                    <button id ='start' type="button" class="btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px">Fire up</button>
                    <!--<button id ='stop' type="button" class="btn btn-primary" style="background: #C4820E; border-color:#C4820E; color:white">Stop</button>-->
            <!-- header -->
            <div class="topic-box">
            

                <div id="selected-card-body" class="card-body">
                    <input id="selected-topic" value="{{$debateTopics}}" style="display:none">
                   
                    <h1 id="selected-topic-display"class="card-title border-bottom"> </h1>
                    <input id="selected-dbtopic_id" value="{{ $randomIndex }}" style="display:none">
                    <!--<h1 id="topic-display" class="card-title border-bottom"></h1>-->
                    <input type="text" id="selected-category" name="selected-category" value="{{$selected_category}}" style="display:none;">
                    <p class="card-text">
                    Category: {{$selected_category}}<br>
                    </p>
                </div>
                <button id ='try-again' type="button" class="btn btn-primary" style="background: #C4820E; border-color:#C4820E; color:white">Try again</button>
                <a id="go-back-catalog" role="button" class="btn btn-primary" href="/topics" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px">Go back to catalog</a>
            </div>
        </div>

    
@endif
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
    <form action="{{url('/p')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="word-card card mb-3" style="border-color:#3b7ea1;">
            <input type="text" id="wordDammyTopic" name="wordDammyTopic" style="display:none;">
            <input type="text" id="wordDammyCateg" name="wordDammyCateg" style="display:none;">
            <input type="text" id="wordDammyTopicId" name="wordDammyTopicId" style="display:none;">
            <input type="text" id="wordwhichPage" name="wordwhichPage" style="display:none;">


            <input id="topic_id" name="topic_id" value="" style="display:none">
            <input id="card_topic"  name="card_topic" value="" style="display:none">
            <div class="form-group" style="margin: 10px">
                <label for="jp_expression">Japanese Expression</label>
                <input type="text" class="form-control" id="jp_expression" name="jp_expression" aria-describedby="emailHelp" placeholder="Enter Jp expression you wanted to say in English">
            </div>
            <div class="form-group" style="margin: 10px">
                <label for="eg_expression">English Expression</label>
                <input type="text" class="form-control" id="eg_expression" name="eg_expression" aria-describedby="emailHelp" placeholder="Enter Eg expression fitting to the context">
            </div>

            <div class="form-group" style="margin: 10px">
                <label for="exmp">Example sentense</label>
                <textarea class="form-control" id="exmp" name="exmp" rows="3"></textarea>
                <small id="emailHelp" class="form-text text-muted">make sentense you want to use in this practice</small>
            </div>
            
        </div>
        <button 
            id="word-regisration" 
            class="btn"
            style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin:10px"
            onclick='(function(){
                    
                    $("#topic_id").val(localStorage.getItem("topicInd"))
                    $("#card_topic").val(localStorage.getItem("topic"))
                })()'
            >Add New Post</button>
        
    </form>
    
</div>
<!--int_debate button を押した後、以下のoutlineを出す-->


<div id="outline-box" class="outline-box">
<div class="jumbotron" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin:10px">
    <h1 class="col-sm-10"> Create your Outline </h1>

            
    <form action="{{url('/outline')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group row">
        <input type="text" id="dammyTopic" name="dammyTopic" style="display:none;">
        <input type="text" id="dammyCateg" name="dammyCateg" style="display:none;">
        <input type="text" id="dammyTopicId" name="dammyTopicId" style="display:none;">
        <input type="text" id="whichPage" name="whichPage" style="display:none;">
        ---> koko 
            <!--topic id-->
        <input type="number" class="form-control form-control-lg" id="dbtopic_id" name="dbtopic_id" style="display:none;">
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
                <textarea rows="4" style="display:none; margin-top: 10px;" cols="50" id="detail1" name="detail1"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">support 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="support2" name="support2" placeholder="reason or example">
                <textarea rows="4" style="display:none; margin-top: 10px;" cols="50" id="detail2" name="detail2" style="display:none"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">support 3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="support3" name="support3" placeholder="reason or example">
                <textarea rows="4" style="display:none; margin-top: 10px;" cols="50"  id="detail3" name="detail3" style="display:none"></textarea>
            </div>
        </div>
        <button class="btn" style="background: #C4820E; border-color:#C4820E; color:white">Add New Post</button>
    </form>
   
    
</div>
</div>

<!--<div id="thesis-card" class="thesis-card">
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
    
</div>-->

</div>

@endsection
