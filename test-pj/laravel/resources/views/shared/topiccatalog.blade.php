<!--topic register-->


@extends('layouts.app')

@section('content')
<div class="container" style="display:flex; flex-direction:column; justify-content: center;">
   <!--<div class="row">-->
   
       
            <div class="topic-register jumbotron">
                <h1 class="display-4"> Create your own topic </h1>
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
                        <option value="social_issues">social issues</option>
                        <option value="technology">technology</option>
                        <option value="education">education</option>
                        <option value="others"> others </option>
                        </select>
                    </div>
                    <button class="topic-register-btn btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px"> Register </button>
                </form> 
            </div>
            <input class="form-control form-control-lg" id="topiccatalog" style="display:none;" value="{{ $topiccatalog }}">
            <input class="form-control form-control-lg" id="outlines" style="display:none;" value="{{ $outlines }}">
            <div id="category-list" class="category-list"></div>
            
    <!--</div>-->
</div>

@endsection