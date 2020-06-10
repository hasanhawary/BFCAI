<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('student/assets/img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Paper</title>
    <link rel="stylesheet" href="{{asset('student/assets/css/app.css')}}">
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="light">

<div id="app">
<main> 
    <div id="primary" class="blue4 p-t-b-100 height-full responsive-phone">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{asset('student/assets/img/basic/stones.png')}}" alt="/">
                </div>
                <div class="col-lg-6">
                    <div class="text-white text-center p-t-100">
                        <p class="glow s-256 bolder p-t-b-100">404</p>
                        <p>Something went wrong. The page you are looking for is gone</p>
                        @if (!empty(instructor()->id) and !empty(student()->id))
                            <div class="p-t-b-20"><a href="{{iurl('/')}}" class="btn btn-primary btn-lg">
                                <i class="icon icon-arrow_back"></i> Go Back To Home</a>
                            </div>
                        @elseif(!empty(student()->id))
                            <div class="p-t-b-20"><a href="{{surl('/')}}" class="btn btn-primary btn-lg">
                                <i class="icon icon-arrow_back"></i> Go Back To Home</a>
                            </div>
                        @elseif(!empty(instructor()->id))
                            <div class="p-t-b-20"><a href="{{iurl('/')}}" class="btn btn-primary btn-lg">
                                <i class="icon icon-arrow_back"></i> Go Back To Home</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

</div>

<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
</body>

</html>