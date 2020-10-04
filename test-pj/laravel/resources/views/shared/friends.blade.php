@extends('layouts.app')

@section('content')
    

<div class="container">
        @foreach($users as $user)

            <div class="card">
                <div class="card-header">
                    
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
                    
                </div>
                <div class="">
                    <div class="d-flex"> 
                        <img src="{{ $user->profile[0]->profileImage() }}" class="rounded-circle" style="width: 10rem; margin:1rem;">
                        
                        <div class="card-body">
                            <h5 class="card-title"> Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a id="see-detail" role="button" class="btn btn-primary" href="/profile/{{ $user->id }}" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-right:10px">see current activities</a>
                        </div>
                    </div>
                </div>
            </div>

        

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


