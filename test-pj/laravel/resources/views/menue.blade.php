<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    </head>
    <body>
       
        <ul>
            <li><a href="#express_your_thought">express your thought</a></li>
            <li><a href="#get_insight_from_others">get insight from others</a></li>
        </ul>
            
       <div id="container"> 
            <div id="express_your_thought"><h1>express your thought</h1>
                <a href="/shared/{{$userid}}" class="transparent_btn"> random </a> 
                <a href="/topics" class="transparent_btn"> catalog </a>
            </div>
            <div id="get_insight_from_others"><h1>get insight from others</h1>
                <a href="/newfriends" class="transparent_btn"> reach out peers </a> 
                <a href="/shared" class="transparent_btn"> see peer's work </a>
            </div>
        </div>
    </body>
</html>