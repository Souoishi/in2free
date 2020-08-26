@extends('layouts.app')

@section('content')

<div class="container">

        <profile-card> <profile-card/>

    
    @foreach($user as $user)
        @if($user->id !== $userid)
            <div class="row pt-2 pb-4">
                <div class="col-6 offset-3"> 
                        <p>
                            <span class="font-weight-bold"> 
                            <a href="/profile/{{ $user->id }}"> 
                                <span class="text-dark"> {{ $user->username }} </span> 
                            </a>  {{ $user->email }}
                        </p>

                </div>

            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="/profile/{{ $user->id }}">
                    <p> {{ $user->name }} </p>
                        
                    </a>
                </div>
            </div>
        @endif
    </div>
    @endforeach
    
        

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <!--$user->links-->
        </div>

    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection