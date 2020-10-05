@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <!--<img src="/storage/{{ $post->image }}" class="w-100">-->
            <div class="word-card card mb-3" style="border-color:#3b7ea1;">
                <div class="form-group" style="margin: 10px">
                    <label for="jp_expression">Japanese Expression</label>
                    <input readonly type="text" class="form-control" id="jp_expression" name="jp_expression" aria-describedby="emailHelp" value="{{$post->jp_expression}}">
                </div>
                <div class="form-group" style="margin: 10px">
                    <label for="eg_expression">English Expression</label>
                    <input readonly type="text" class="form-control" id="eg_expression" name="eg_expression" aria-describedby="emailHelp" value="{{$post->eg_expression}}">
                </div>

                <div class="form-group" style="margin: 10px">
                    <label for="exmp">Example sentense</label>
                    <textarea readonly class="form-control" id="exmp" name="exmp" rows="3" value="{{$post->exmp}}"></textarea>
                    <small id="emailHelp" class="form-text text-muted">make sentense you want to use in this practice</small>
                </div>
            </div>
           
        </div>

        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        
                        <img src="{{ $post->user->profile[0]->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="font-weight-bold"> 
                            <a href="/profile/{{ $post->user->id }}"> 
                                <span class="text-dark">{{ $post->user->username }} </span> 
                            </a> 

                            <a href="#" class="pl-3">
                                Follow
                            </a>

                        </div>
                    </div>
                </div>

                <hr>
                
                <p>
                    <span class="font-weight-bold"> 
                        <span class="text-dark"> {{ $post->user->description }} </span> 
                
                </p>

            </div>
        </div>

    </div>
</div>
@endsection