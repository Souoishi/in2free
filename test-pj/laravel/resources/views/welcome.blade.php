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

        <div id="express_your_thought">
                <a href="{{ route('login') }}" class="transparent_btn_login"> Login </a> 
                <a href="/register" class="transparent_btn_login"> Register </a>
        </div>       
                
        </div>
    </body>
</html>
