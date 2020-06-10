<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>BFCAI</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" href="{{asset('dashboard/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/plugins/ionicons/dist/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/plugins/icon-kit/dist/css/iconkit.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/dist/css/theme-en.css')}}">
        <script src="{{asset('dashboard/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Muli&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Muli', sans-serif;
            }
        </style>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

       <div class="auth-wrapper">
            <div class="container-fluid ">
                <div class="row flex-row  bg-white">
                     <div class="col-xl-7 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('dashboard/img/auth/login-bg.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href=""><img src="{{asset('dashboard/src/img/logo.png')}}" alt=""></a>
                            </div>
                            <h3 class="text-center" style="font-size:23px" >Welcome in BFCAI.com</h3>
                            <p class="text-center" style="margin-bottom:30px">Pleased to login you!</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="text" class="form-control text-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required >
                                    <i class="ik ik-mail"></i>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                 <div class="form-group" >
                                    <input id="password" type="password" class="form-control text-left @error('password') is-invalid @enderror" name="password"  placeholder="Password" required >
                                    <i class="ik ik-lock"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row" style="margin-bottom:30px" >
                                     <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control_input" id="item_checkbox">
                                            <span class="custom-control_label">&nbsp;Remeber Me</span>
                                        </label>
                                    </div>

                                    <div class="col text-right">
                                  
                                        @if (Route::has('password.request'))
                                            <a class="btn-link"  style="color:#333" href="{{ route('password.request') }}">
                                                I forgot the password
                                            </a>
                                        @endif
                                    </div>
                                                                       
                                </div>
                                <div class="sign-btn text-center" style="margin-bottom:30px;">
                                    <button class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>Still do not have an account ? <a  class="btn-link" style="color:#0a8cd7 !important" href="{{url('register')}}">Create a new account</a></p>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('dashboard/src/js/vendor/jquery-3.3.1.min.js')}}"><\/script>')</script>
        <script src="{{asset('dashboard/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('dashboard/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('dashboard/dist/js/theme.js')}}"></script>

    </body>
</html>
