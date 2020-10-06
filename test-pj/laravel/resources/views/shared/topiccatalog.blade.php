<!--topic register-->


@extends('layouts.app')

@section('content')
<!--<div class="container" style="display:flex; flex-direction:column; justify-content: center;">-->
        <ul class="lists">
            <li class="menues" style="display: block;"> <a id="go-back-catalog" role="button" onclick='(function(){
                    $("#topic-register").show()
                    $("#category-list").show()
                    $("#topic-list").hide()
                    $("#back-to-category-btn").hide()
                    $("#topic-list").empty()
                    })()'
                > Back</a></li>
            <li class="menues" style="display: block;"><a href="#topic-register">Create your own topics</a></li>
            <li class="catalogs" style="display: block;"><a href="#category-card0">go to a topic catalog</a></li>
            <li class="elem" style="display: block;"><a href="#category-card0">Economy</a></li>
            <li class="elem" style="display: block;"><a href="#category-card1">Sports</a></li>
            <li class="elem" style="display: block;"><a href="#category-card2">Politics</a></li>
            <li class="elem" style="display: block;"><a href="#category-card3">Music</a></li>
            <li class="elem" style="display: block;"><a href="#category-card4">Social issues</a></li>
            <li class="elem" style="display: block;"><a href="#category-card5">Technology</a></li>
            <li class="elem" style="display: block;"><a href="#category-card6">Education</a></li>
            <li class="elem" style="display: block;"><a href="#category-card7">Others</a></li>
        </ul>
            
       <div id="container-topic"> 
            
            
                <!--<button id="go-to-register-btn"class="topic-register-btn btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-bottom:30px; width:200px"
                    onclick='(function(){
                        $("#back-to-catalog-btn").show()
                        $("#topic-register").show()
                        $("#category-list").hide()
                        $("#go-to-register-btn").hide()
                        $("#topic-list").hide()
                    })()'
                > Create your own topics </button>

                <button id="back-to-catalog-btn"class="topic-register-btn btn btn-primary" style="display:none; background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-bottom:30px; width:100px"
                    onclick='(function(){
                        $("#category-list").show()
                        $("#go-to-register-btn").show()
                        $("#back-to-catalog-btn").hide()
                        $("#topic-register").hide()
                        $("#topic-list").hide()
                    })()'
                > Back</button>-->
            
            <div id="topic-register" style="width:60%" class="topic-register">
                <h1 class="display-4" style="margin-bottom:50px; "> Create your own topic </h1>
                <form action="/topic-register" enctype="multipart/form-data" method="get">
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">New topic</label>
                        <input type="text" class="form-control form-control-lg" id="register-topic" name="topic" placeholder="write your topic here">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select category</label>
                        <select class="form-control" id="register-category" name="category">
                        <option value="sports">sports</option>
                        <option value="politics">politics</option>
                        <option value="economy">economy</option>
                        <option value="music">music</option>
                        <option value="social issues">social_issues</option>
                        <option value="technology">technology</option>
                        <option value="education">education</option>
                        <option value="others"> others </option>
                        </select>
                    </div>
                    <button class="topic-register-btn btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px"> Register </button>
                </form> 
            </div>

            <!--<button id="back-to-category-btn"class="topic-register-btn btn btn-primary" style="display:none; background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-bottom:30px; width:100px"
                onclick='(function(){
                    $("#category-list").show()
                    $("#topic-list").hide()
                    $("#back-to-category-btn").hide()
                    $("#topic-list").empty()
    
                })()'
                > Back </button>-->
            <input class="form-control form-control-lg" id="topiccatalog" style="display:none;" value="{{ $topiccatalog }}">
            <input class="form-control form-control-lg" id="outlines" style="display:none;" value="{{ $outlines }}">
            <div id="category-list" class="category-list"></div>
            <div id="topic-list" class="topic-list" style="width:60%; text-align:center"></div>
            
        </div>     
    <!--</div>-->


@endsection