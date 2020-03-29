<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Housy - Real Estate HTML5 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/css/animate.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/css/bootstrap-submenu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend_template/css/leaflet.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('frontend_template/css/map.css" type="text/css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/fonts/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/fonts/flaticon/font/flaticon.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/fonts/linearicons/style.css')); ?>">
    <link rel="stylesheet" type="text/css"  href="<?php echo e(asset('frontend_template/css/jquery.mCustomScrollbar.css')); ?>">
    <link rel="stylesheet" type="text/css"  href="<?php echo e(asset('frontend_template/css/dropzone.css')); ?>">
    <link rel="stylesheet" type="text/css"  href="<?php echo e(asset('frontend_template/css/slick.css')); ?>">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?php echo e(asset('frontend_template/css/skins/default.css')); ?>">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo e(asset('frontend_template/img/favicon.ico')); ?>" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRoboto:300,400,500,700&display=swap">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend_template/css/ie10-viewport-bug-workaround.css')); ?>">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
    
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />


  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
  <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
    <style type="text/css">
        #map { height:600px ;width:100%; }
      .geocoder {
            position:relative;
        }
     #embed_code{
    width: 425px;
    height:50px;
    }
     #embed_code_old{
    width: 100%;
    height:200px;
    }
    </style>
</head>
<body>
    <div class="page_loader"></div>

    <!-- Main header start -->
    <header class="main-header mh-3 header-transparent">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand logos" href="index.html">
                    <img src="<?php echo e(asset('frontend_template/img/logo.png')); ?>" alt="logo" class="logo-none-2">
                    <img src="<?php echo e(asset('frontend_template/img/logo.png')); ?>" alt="logo" class="logo-none">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  active">
                            <a class="nav-link" href="<?php echo e(route('main')); ?>" aria-haspopup="true" aria-expanded="false">
                                Home
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('property')); ?>" aria-haspopup="true" aria-expanded="false">
                                Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('agent')); ?>" aria-haspopup="true" aria-expanded="false">
                                Agents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('blog')); ?>" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>" aria-haspopup="true" aria-expanded="false">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>" aria-haspopup="true" aria-expanded="false">
                                    Register
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Banner start -->
    <div class="banner" id="banner">
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo e(asset('frontend_template/img/banner.jpg')); ?>" alt="banner" style="height: 400px;">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="sub-banner">
                                    <div class="container">
                                        <div class="page-name">
                                            <h1>Properties Listing</h1>
                                            <ul>
                                                <li><a href="index.html">Index</a></li>
                                                <li><span>/</span>Properties Listing</li>
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  properties start -->
     <div class="properties-section-body content-area">
    <div class="container">
        <div class="row">
           <?php echo $__env->yieldContent('property'); ?>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="sidebar widget advanced-search">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <form method="GET">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="property-sdtatus">
                                    <option>Property Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="property-type">
                                    <option>Property Type</option>
                                    <option>Apartments</option>
                                    <option>Houses</option>
                                    <option>Commercial</option>
                                    <option>Garages</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="commercial">
                                    <option>Commercial</option>
                                    <option>Residential</option>
                                    <option>Land</option>
                                    <option>Hotels</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="location">
                                    <option>location</option>
                                    <option>New York</option>
                                    <option>Bangladesh</option>
                                    <option>India</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            <option>Bedrooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="bathroom">
                                            <option>Bathroom</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="balcony">
                                            <option>Balcony</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="garage">
                                            <option>Garage</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="range-slider">
                                <label>Area</label>
                                <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="range-slider">
                                <label>Price</label>
                                <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                <div class="clearfix"></div>
                            </div>

                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                <i class="fa fa-plus-circle"></i> Show More Options
                            </a>
                            <div id="options-content" class="collapse">
                                <label class="margin-t-10">Features</label>
                                <div class="s-border"></div>
                                <div class="m-border"></div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                        Free Parking
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2">
                                        Air Condition
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">
                                        Places to seat
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">
                                        Swimming Pool
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox5" type="checkbox">
                                    <label for="checkbox5">
                                        Laundry Room
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox6" type="checkbox">
                                    <label for="checkbox6">
                                        Window Covering
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox7" type="checkbox">
                                    <label for="checkbox7">
                                        Central Heating
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox8" type="checkbox">
                                    <label for="checkbox8">
                                        Alarm
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button class="search-button">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- Popular posts start -->
                    <div class="widget popular-posts">
                        <h3 class="sidebar-title">Popular Posts</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="#">Modern Design Building</a>
                                </h3>
                                <p>Apr 15, 2019 | $2041,000</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="#">Real Eatate Expo 2018</a>
                                </h3>
                                <p>Feb 27, 2019 | $1045,000</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                            </div>
                            <div class="media-body align-self-center">
                                <h3 class="media-heading">
                                    <a href="#">Villa in Coral Gables</a>
                                </h3>
                                <p>Apr 21, 2019 | $545,000</p>
                            </div>
                        </div>
                    </div>
                    <!-- Posts by category start -->
                    <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Category</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Single Family <span>(45)</span></a></li>
                            <li><a href="#">Apartment <span>(21)</span> </a></li>
                            <li><a href="#">Condo <span>(23)</span></a></li>
                            <li><a href="#">Multi Family <span>(19)</span></a></li>
                            <li><a href="#">Villa <span>(19)</span></a> </li>
                            <li><a href="#">Other <span>(22) </span></a></li>
                        </ul>
                    </div>
                    <!-- Helping Center start -->
                    <div class="widget helping-center">
                        <h3 class="sidebar-title">Helping Center</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <ul class="contact-link">
                            <li>
                                <i class="flaticon-location"></i>
                                20-21 Kathal St. Tampa City, FL
                            </li>
                            <li>
                                <i class="flaticon-technology-1"></i>
                                <a href="tel:+55-417-634-7071">
                                    +55 417 634 7071
                                </a>
                            </li>
                            <li>
                                <i class="flaticon-envelope"></i>
                                <a href="mailto:info@themevessel.com">
                                    info@themevessel.com
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Latest reviews start -->
                    <div class="widget latest-reviews">
                        <h3 class="sidebar-title">Reviews</h3>
                        <div class="s-border"></div>
                        <div class="m-border"></div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="avatar-1">
                                </a>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading"><a href="#">Emma Connor</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiamrisus tortor, accumsan</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="avatar-2">
                                </a>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading"><a href="#">Martin Smith</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiamrisus tortor, accumsan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
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
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="media-heading">
                                        <a href="#">Real Eatate Expo 2019</a>
                                    </h3>
                                    <p>Feb 27, 2019 | $1045,000</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="media-heading">
                                        <a href="#">Big Head House</a>
                                    </h3>
                                    <p>Apr 15, 2019 | $2041,000</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="media-heading">
                                        <a href="#">Villa in Coral Gables</a>
                                    </h3>
                                    <p>Apr 21, 2019 | $545,000</p>
                                </div>
                            </div>
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

    <script src="<?php echo e(asset('frontend_template/js/jquery-2.2.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/bootstrap-submenu.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/rangeslider.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/jquery.mb.YTPlayer.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/jquery.scrollUp.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/leaflet.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/leaflet-providers.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/leaflet.markercluster.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/jquery.filterizr.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/jquery.countdown.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/maps.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_template/js/app.js')); ?>"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo e(asset('frontend_template/js/ie10-viewport-bug-workaround.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>

</body>
</html><?php /**PATH /opt/lampp/htdocs/property/resources/views/frontend/property_template.blade.php ENDPATH**/ ?>