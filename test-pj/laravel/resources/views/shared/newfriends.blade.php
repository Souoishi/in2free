@extends('layouts.app')

@section('content')
    

<div class="container">
        @foreach($users as $user)

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
                            <img src="{{asset($user->profile[0]->profileImage())}}" class="rounded-circle" style="width: 10rem; margin:1rem;">
                            
                            <div class="card-body">
                                <h5 class="card-title"> Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <follow-b user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-b> 
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        

        @endforeach
            
        </div>
        <div class="row">
    
            <div class="col-12 d-flex justify-content-center">
                <!--$user->links-->
            </div>

        </div>
    </div>
</div>

@endsection

