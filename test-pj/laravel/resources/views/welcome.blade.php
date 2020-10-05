<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    </head>
    <body>

        
            
       <div class="container">
            <ul>
                <li><a href="#express_your_thought">express your thought</a></li>
                <li><a href="#get_insight_from_others">get insight from others</a></li>
            </ul>
            <h1 class="text_over_image">In2Free</h1>
            
                <div class="box a">
                    <img src="/storage/bg/img1.jpg">
                </div>
                <div class="box b">
                        <img src="/storage/bg/img2.jpg">
                </div>
                <div class="box c">
                        <img src="/storage/bg/img3.jpg">
                </div>
                <div class="box d">
                        <img src="/storage/bg/img4.jpg">
                </div>
                <div class="box e">
                        <img src="/storage/bg/img5.jpg">
                </div>
                <div class="box f">
                        <img src="/storage/bg/img6.jpg">
                </div>
                <div class="box g">
                        <img src="/storage/bg/img7.jpg">
                </div>
                <div class="box h">
                        <img src="/storage/bg/img8.jpg">
                </div>
                <div class="box i">
                        <img src="/storage/bg/img9.jpg">
                </div>
                <div class="box j">
                        <img src="/storage/bg/img10.jpg">
                </div>
            

        

       </div>
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
