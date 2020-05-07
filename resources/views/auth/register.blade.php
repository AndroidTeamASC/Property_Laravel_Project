<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>LuxCouch Thailand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/css/bootstrap-submenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend_template/css/leaflet.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend_template/css/map.css" type="text/css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/fonts/linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_template/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_template/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('frontend_template/css/slick.css')}}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('frontend_template/css/skins/default.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('frontend_template/img/favicon.ico')}}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRoboto:300,400,500,700&display=swap">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/css/ie10-viewport-bug-workaround.css')}}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="page_loader"></div>

<!-- Contact section start -->
<div class="contact-section">
    <div class="container">
        <div class="row login-box">
            <div class="col-lg-6 align-self-center pad-0">
                <div class="form-section clearfix">
                    <h3>Create an account</h3>
                    <div class="btn-section clearfix">
                        <a href="{{route('login')}}" class="link-btn active btn-1 default-bg">Login</a>
                        <a href="{{route('register')}}" class="link-btn btn-2 active-bg">Register</a>
                    </div>
                    <div class="clearfix"></div>
                    <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role" value="user">
                        <div class="form-group form-box">
                            <input type="text" name="name" class="form-control input-text @error('name') is-invalid @enderror" id="name" placeholder="Full Name" value="{{ old('name') }}" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-box">
                            <input type="email" name="email" class="form-control input-text @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-box">
                            <input type="text" name="phone_no" class="form-control input-text @error('phone_no') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phone_no') }}" autofocus>
                            @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-box">
                            <input type="text" name="address" class="form-control input-text @error('address') is-invalid @enderror" placeholder=" Address" value="{{ old('address') }}" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-box">
                            <input type="file" name="image" class="form-control input-text @error('image') is-invalid @enderror" value="{{ old('image') }}" autofocus>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-box clearfix">
                            <input type="password" name="password" class="form-control input-text @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-box clearfix">
                            <input type="password" name="password_confirmation" class="input-text" placeholder="Confirm Password">
                        </div>
                        <div class="form-group clearfix mb-0">
                            <button type="submit" class="btn-md btn-theme float-left">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 bg-color-15 align-self-center pad-0 none-992 bg-img">
                <div class="info clearfix">
                    <div class="logo-2">
                        <a href="login.html">
                            <img src="{{asset('frontend_template/img/logo.png')}}" class="cm-logo" alt="black-logo">
                        </a>
                    </div>
                    <h3>Welcome to logdy</h3>
                    <div class="social-list">
                        <a href="#" class="facebook-bg">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="twitter-bg">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="google-bg">
                            <i class="fa fa-google"></i>
                        </a>
                        <a href="#" class="linkedin-bg">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>
    <script src="{{ asset('frontend_template/js/jquery-2.2.0.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/popper.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/bootstrap-submenu.js')}}"></script>
    <script src="{{ asset('frontend_template/js/rangeslider.js')}}"></script>
    <script src="{{ asset('frontend_template/js/jquery.mb.YTPlayer.js')}}"></script>
    <script src="{{ asset('frontend_template/js/wow.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('frontend_template/js/jquery.scrollUp.js')}}"></script>
    <script src="{{ asset('frontend_template/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/leaflet.js')}}"></script>
    <script src="{{ asset('frontend_template/js/leaflet-providers.js')}}"></script>
    <script src="{{ asset('frontend_template/js/leaflet.markercluster.js')}}"></script>
    <script src="{{ asset('frontend_template/js/dropzone.js')}}"></script>
    <script src="{{ asset('frontend_template/js/slick.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/jquery.filterizr.js')}}"></script>
    <script src="{{ asset('frontend_template/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/jquery.countdown.js')}}"></script>
    <script src="{{ asset('frontend_template/js/maps.js')}}"></script>
    <script src="{{ asset('frontend_template/js/app.js')}}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('frontend_template/js/ie10-viewport-bug-workaround.js')}}"></script>
</body>
</html>