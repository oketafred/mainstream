<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Metromed - Medical Centre - Login</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{asset('assets/dist/img/ico/favicon.png')}}" type="image/x-icon">


    <!-- Bootstrap -->
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Pe-icon-7-stroke -->
    <link href="{{asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>
    <!-- style css -->
    <link href="{{asset('assets/dist/css/stylehealth.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Toastr -->
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}"> --}}
    <!-- Theme style rtl -->
    <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
    <style>
        body {
            overflow: hidden;
        }
        .container-center{
            margin-top: 80px !important;
        }
    </style>
</head>
<body>
    <!-- Content Wrapper -->
    <div class="login-wrapper">
        <div class="container-center">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe-7s-unlock"></i>
                        </div>
                        <div class="header-title">
                            <h3>Login</h3>
                            <small><strong>Please enter your credentials to login.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('success'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong></strong> {{ session('success') }}
                  </div>
                  @endif
                  @if (session('error'))
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Oh snap!</strong> {{ session('error') }}
                  </div>
                  @endif
                  <form action="{!! route('login') !!}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label" for="username">Email address</label>
                        <input type="email" name="email" placeholder="example@gmail.com" title="Please enter you email address" class="form-control" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" name="password" title="Please enter your password" placeholder="******" id="password" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-warning btn-block btn-lg">Login</button>
                        <a class="btn  btn-link  btn-flat" href="{!! route('forgot_password') !!}">Forgot possword?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="{{asset('assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- Toastr -->
{{-- <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script> --}}

</body>

</html>
