<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Housy - Real Estate HTML5 Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_template/css/custom.css')}}">

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

    <!-- Main header start -->
    <header class="main-header mh-3 header-transparent">
        <div class="container">
            <nav class="navbar  navbar-expand-lg navbar-light">
                <a class="navbar-brand logos" href="index.html">
                    <img src="{{asset('frontend_template/img/logo.png')}}" alt="logo" class="logo-none-2">
                    <img src="{{asset('frontend_template/img/logo.png')}}" alt="logo" class="logo-none">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  active">
                            <a class="nav-link" href="{{route('main')}}" aria-haspopup="true" aria-expanded="false">
                                Home
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('property')}}" aria-haspopup="true" aria-expanded="false">
                                Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('agent')}}" aria-haspopup="true" aria-expanded="false">
                                Agents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('blog')}}" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}" aria-haspopup="true" aria-expanded="false">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}" aria-haspopup="true" aria-expanded="false">
                                    Register
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Banner start -->
    @yield('banner')
    <!-- Search properties start -->
    @yield('search_properties')
    <!-- Featured properties start -->
    @yield('featured_properties')
    <!-- Services 3 start -->
    @yield('services')
    <!-- Recently properties start -->
    @yield('recent_properties')
    <!-- Categories strat -->
    @yield('categories')
    <!-- Counters strat -->
    @yield('counters')
    <!-- Our team 2 start -->
    @yield('team')
    <!-- Testimonial 2 start -->
    @yield('testimonial')
    <div class="clearfix"></div>
    <!-- Blog start -->
    @yield('blog')
    <!-- Partners strat -->
    @yield('partners')
    <!-- Footer start -->
    <footer class="footer">
        <div class="container footer-inner">
            <div class="row">
                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>Contact Us</h4>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="contact-info">
                            <li>
                                Address: 20/F Green Road, Dhanmondi, Dhaka
                            </li>
                            <li>
                                Email: <a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                            </li>
                            <li>
                                Phone: <a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                            </li>
                            <li>
                                Fax: +0477 85X6 552
                            </li>
                        </ul>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>Useful Links</h4>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="links">
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>Home</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>About Us</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>Services</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>Properties Details</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>My Account</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-right"></i>Properties Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>Popular Posts</h4>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <div class="popular-posts">
                            @foreach($popular_posts as $popular_post)
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="{{asset($popular_post->image)}}" alt="sub-properties">
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="media-heading">
                                        <a href="blog_detail/{{$popular_post->id}}">{{$popular_post->title}}</a>
                                    </h3>
                                    <p>{{$popular_post->created_at}} | {{$popular_post->type->type}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>Subscribe</h4>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <div class="Subscribe-box">
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                            <form action="#" method="GET">
                                <p>
                                    <input type="text" class="form-contact" name="email" placeholder="Enter Address">
                                </p>
                                <p>
                                    <button type="submit" name="submitNewsletter" class="btn btn-block button-theme">
                                        Subscribe
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy">© 2020 <a href="#">Theme Vessel.</a> Trademarks and brands are the property of their respective owners.</p>
                </div>
            </div>
        </div>
    </footer>
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
    <script src="{{ asset('frontend_template/js/jquery.timeago.js')}}" type="text/javascript"></script>
    @yield('script')
    @yield('blog_detail_script')
</body>
</html>