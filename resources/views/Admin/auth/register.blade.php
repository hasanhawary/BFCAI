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
        <script src="{{asset('src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
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
                        <div class="lavalite-bg lavalite-bg-reg" style="background-image: url('dashboard/img/auth/register-bg.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href=""><img src="{{asset('dashboard/src/img/logo.png')}}" alt=""></a>
                            </div>
                            <h3 class="text-center" style="font-size:23px" >Welcome in BFCAI.com</h3>
                            <p class="text-center">Pleased to register you!</p>
                           <form method="POST" action="{{ route('register') }}">
                              @csrf
                              
                                <div class="form-group">
                                    <input id="first_name" type="text" class="form-control  text-left placeholder @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required >
                                    <i class="ik ik-user"></i>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="last_name" type="text" class="form-control  text-left placeholder @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required >
                                    <i class="ik ik-user"></i>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                

                                <div class="form-group">
                                    <input id="email" type="text" class="form-control  text-left placeholder @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required >
                                    <i class="ik ik-mail"></i>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" class="form-control  text-left placeholder @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" required >
                                    <i class="ik ik-lock"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control  text-left placeholder" name="password_confirmation"  placeholder="Confirm Password" required >
                                    <i class="ik ik-lock"></i>                               
                                </div>
                                                             
                                <div class="row">
                                    <div class="col-12 text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control_input" id="item_checkbox">
                                            <span class="custom-control_label">&nbsp;I agree to  <a href="#" data-toggle="modal" data-target="#regAgreement" data-toggle="tooltip" data-placement="top" title="" data-original-title="the registration terms">the registration terms </a></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button type="submit" id="btncheck" class="btn btn-primary" disabled>Create Account</button>
                                </div>
                            </form>
                            <div class="register">
                            <p>Do you have a aready account? <a class="btn-link" style="color:#0a8cd7 !important" href="{{url('login')}}">login</a></p>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="regAgreement" tabindex="-1" role="dialog" aria-labelledby="regAgreement" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " style="text-align:left !important" id="regAgreement">the registration terms </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="text-align:left !important">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="text-align:left !important" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> 
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('dashboard/src/js/vendor/jquery-3.3.1.min.js')}}"><\/script>')</script>
        <script src="{{asset('dashboard/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('dashboard/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('dashboard/dist/js/theme.js')}}"></script>
        <script>
			$('#item_checkbox').change(function () {
				$('#btncheck').prop("disabled", !this.checked);
			});
		</script>

    </body>
</html>
       