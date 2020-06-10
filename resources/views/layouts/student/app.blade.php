<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Student</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('student/assets/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
    <link rel="stylesheet" href="{{asset('student/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('student/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/noty/noty.css')}}">
    <script src="{{ asset('dashboard/plugins/noty/noty.min.js') }}"></script>
    @stack('style')

    <style>
        .loadering {
        border: 5px solid #f3f3f3;
        border-radius: 50%;
        border-top: 5px solid #367FA9;
        width: 60px;
        height: 60px;
        -webkit-animation: spin 1s linear infinite;
        /* Safari */
        animation: spin 1s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
    </style>
    <script>
        ( function ( w, d, u ) {
            w.readyQ = [];
            w.bindReadyQ = [];

            function p( x, y ) {
                if ( x == "ready" ) {
                    w.bindReadyQ.push( y );
                } else {
                    w.readyQ.push( x );
                }
            };
            var a = {
                ready: p,
                bind: p
            };
            w.$ = w.jQuery = function ( f ) {
                if ( f === d || f === u ) {
                    return a
                } else {
                    p( f )
                }
            }
        } )( window, document )
    </script>
</head>

<body class="light">
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app">   
        @include('layouts.student.sidebar')
        @include('layouts.student.navbar')
        
        @yield('content')
        @include('partials._session')
        
    </div>

    <!--/#app -->
    <script src="{{asset('student/assets/js/app.js')}}"></script>
    <script src="{{asset('dashboard/dist/js/theme.min.js')}}"></script>
    <script src="{{ asset('dashboard/plugins/noty/noty.min.js') }}"></script>
    <script src="{{asset('student/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery-nice-select-1.1.0/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

    @stack('script')
</body>
</html>