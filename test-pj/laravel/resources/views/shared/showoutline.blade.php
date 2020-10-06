@extends('layouts.app')

@section('content')
<div class="container" style="display:flex; flex-direction:column; justify-content: center;">
    
        
            <div id="topic-card" class="card mb-3" style="border-color:#3b7ea1; color:#fdb515; margin-right:10px">
                <div class="card-header" style="background:#3b7ea1;">{{ $debate_topics->category}}</div>
                <div class="card-body text-primary">
                    <h5 class="card-title" style="color:#3b7ea1;">{{ $debate_topics->topic }}</h5>
                    <a id="selected-practice-btn" role="button" class="btn btn-primary" href="/selected/{{$debate_topics->id}}" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px">Go to practice</a>
                </div>
            </div>
            <input class="form-control form-control-lg" id="outline-list" style="display:none;" value="{{ $outlines }}">
            <input class="form-control form-control-lg" id="t-id" style="display:none;" value="{{ $debate_topics->id }}">
            <input class="form-control form-control-lg" id="users-for-topics" style="display:none;" value="{{ $users }}">
            <div id="outline-forums" class="outline-forums"></div>
            
          
    
</div>
@endsection