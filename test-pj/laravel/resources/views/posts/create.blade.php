@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post" >
    @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Add new post!</h4>
                    </div>
                </div>
                

                <div class="word-card card mb-3" style="border-color:#3b7ea1;">
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


                <div class="row pt-4">
                    <button class="btn btn-primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin:10px">Add New Post</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
