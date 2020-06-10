<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BFCAI</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/icon-kit/dist/css/iconkit.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/jquery-nice-select-1.1.0/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('student/assets/css/app.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" rel="stylesheet"/>

    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('dashboard/plugins/bootstrap/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/wizard/steps-ar.css')}}" rel="stylesheet">
    @else
    <link rel="stylesheet" href="{{asset('dashboard/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/theme-en.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/wizard/steps.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <style>
        html,body{
            font-family: 'Muli' ,Changa,sans-serif, 'Times New Roman', Times, serif !important;
        }
    </style>
    @endif

    <link rel="stylesheet" href="{{asset('dashboard/plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard/plugins/noty/noty.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">

    <style>
    .mr-2 {
        margin-right: 5px;
    }

    .loader {
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

    .ofwhite {
        color: #DDD !important;
    }
    .card{
        margin-top: -15px !important;
    }

    </style>
    @stack('style')

</head>

<body>
    <div class="wrapper">
        @include('layouts.Instructor.header')
        <div class="page-wrap">
            @include('layouts.Instructor.sidebar')
            <div class="main-content">
                <div class="container-fluid">
                    @yield('content')
                    @include('partials._session')
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('dashboard/js/alerts.js')}}"></script>
    <script src="{{asset('dashboard/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('dashboard/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/screenfull/dist/screenfull.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datedropper/datedropper.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery.repeater/jquery.repeater.js')}}"></script>
    <script src="{{asset('dashboard/plugins/jquery-nice-select-1.1.0/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('dashboard/js/form-picker.js')}}"></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
    <script src="{{asset('dashboard/dist/js/theme.min.js')}}"></script>
    <script src="{{asset('dashboard/js/form-components.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/autocalc/jautocalc.js')}}"></script>
    <script src="{{asset('dashboard/plugins/wizard/jquery.steps.min.js')}}"></script>
    <script src="{{asset('dashboard/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/intlTelInput.min.js"></script>
    
    <script>
        CKEDITOR.replace('editor1', {
            extraPlugins: 'placeholder',
            height: 220
        });
    </script>
    @stack('script')
    @if (app()->getLocale() == 'ar')
        <script>
            $('#advanced_table').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"
                }
            });
        </script>
    @else
        <script>
            $('#advanced_table').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.20/i18n/English.json"
                }
            });
        </script>
    @endif

    <script>
        $('.row .otherRowinput').hide();
        $('[type=radio]').on('change', function () {
            if ($('.form-radio input:nth-child(1)').val() == $(this).val() ||
                $('.form-radio input:nth-child(2)').val() == $(this).val()) {
                $(this).closest(".row").find(".otherRowinput").toggle('fast');
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".image").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.image-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            
            $('a[href="#next"]').click(function(event) {
                //Fetch form to apply custom Bootstrap validation
                var form = $(".tab-wizard")
                if (form[0].checkValidity() === false) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.addClass('was-validated');
                //Perform ajax submit here...
            });
        });

        /** autoCalc **/
        function autoCalcSetup() {
            $('table').jAutoCalc('destroy');
            $('table tr').jAutoCalc({
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('table').jAutoCalc({
                decimalPlaces: 2,
                emptyAsZero: true
            });
        }
    </script>
</body>

</html>

    

