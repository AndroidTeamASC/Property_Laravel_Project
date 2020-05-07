<!--

=========================================================
* Argon Dashboard - v1.1.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Property</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo e(asset('frontend_template/img/favicon.ico')); ?>" type="image/x-icon" >
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Icons -->
  <link href="<?php echo e(asset('backend_template/assets/js/plugins/nucleo/css/nucleo.css')); ?>" rel="stylesheet" />

  <link href="<?php echo e(asset('backend_template/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend_template/assets/css/dataTables.css')); ?>">
  <!-- CSS Files -->
  <link href="<?php echo e(asset('backend_template/assets/css/argon-dashboard.css?v=1.1.1')); ?>" rel="stylesheet" />

  <link href="<?php echo e(asset('backend_template/table/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">


  <link href="<?php echo e(asset('backend_template/assets/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">

  <link href="<?php echo e(asset('backend_template/assets/css/mine.css')); ?>" rel="stylesheet">
 
  <link href="<?php echo e(asset('dist/css/select2.min.css')); ?>" rel="stylesheet" />
  
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />


  <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
  <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
  <style type="text/css">
    #map { height:400px ;width:300; }
      .geocoder {
            position:relative;
        }
     #embed_code{
    width: 425px;
    height:50px;
  }
     
    @media (max-width: 720px){
        .profilemedia{
           text-align: center;
            margin-left: 183px;
            margin-right: 0px;
            margin-top: 0px;
            padding-top: 0px;
        }
    }

    .sfont{
      font-size: 0.875rem;
    }
  </style>
  <?php echo $__env->yieldContent('style'); ?>

</head>

<body class="">

  <div id = "dialog-4" title = "Dialog Title goes here...">
        
      </div>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
      <a class="navbar-brand pt-0" href="<?php echo e(route('admin.dashboard')); ?>">
        <img src="<?php echo e(asset('frontend_template/img/logo.png')); ?>" class="navbar-brand-img" alt="...">
      </a>
      <?php endif; ?>
      <?php if(auth()->check() && auth()->user()->hasRole('agent')): ?>
      <a class="navbar-brand pt-0" href="<?php echo e(route('agent.dashboard')); ?>">
        <img src="<?php echo e(asset('frontend_template/img/logo.png')); ?>" class="navbar-brand-img" alt="...">
      </a>
      <?php endif; ?>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?php echo e(asset('backend_template/assets/img/theme/team-1-800x800.jpg')); ?>">
              </span>
            </div>
          </a>
          <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
          <?php endif; ?>
          <?php if(auth()->check() && auth()->user()->hasRole('agent|preminun_agent')): ?>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="<?php echo e(route('agent.profile')); ?>" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
          <?php endif; ?>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
              <a href="<?php echo e(route('admin.dashboard')); ?>">
                <img src="<?php echo e(asset('backend_template/assets/img/brand/blue.png')); ?>">
              </a>
              <?php endif; ?>
              <?php if(auth()->check() && auth()->user()->hasRole('agent')): ?>
              <a href="<?php echo e(route('agent.dashboard')); ?>">
                <img src="<?php echo e(asset('backend_template/assets/img/brand/blue.png')); ?>">
              </a>
              <?php endif; ?>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
         <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
          <li class="nav-item  active ">
            <a class="nav-link " href="<?php echo e(route('admin.dashboard')); ?>">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <?php endif; ?>
          <?php if(auth()->check() && auth()->user()->hasRole('agent')): ?>
          <li class="nav-item  active ">
            <a class="nav-link " href="<?php echo e(route('agent.dashboard')); ?>">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <?php endif; ?>
          <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo e(route('admin.status.index')); ?>">
              <i class="ni ni-ungroup text-blue"></i> Status
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo e(route('admin.type.index')); ?>">
              <i class="ni ni-paper-diploma text-blue"></i> Type
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link " href="<?php echo e(route('admin.tag.index')); ?>">
              <i class="ni ni-tag text-blue"></i> Tag
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link " href="<?php echo e(route('admin.feature.index')); ?>">
              <i class="ni ni-app text-blue"></i> Feature
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo e(route('admin.transportation.index')); ?>">
              <i class="ni ni-delivery-fast text-blue"></i> Transportation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo e(route('admin.agent.index')); ?>">
              <i class="ni ni-circle-08 text-blue"></i> Agent
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo e(route('admin.post.index')); ?>">
              <i class="ni ni-archive-2 text-blue"></i> Blog Post
            </a>
          </li>
           <?php endif; ?>
           <?php if(auth()->check() && auth()->user()->hasAnyRole('agent')): ?>
          <li class="nav-item">
            <a class="nav-link  active " href="<?php echo e(route('agent.property.index')); ?>">
              <i class="ni ni-building text-blue"></i> Property
            </a>
          </li>
          <?php endif; ?>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-lg navbar-dark " id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?php echo e(route('admin.dashboard')); ?>"><i class="ni ni-bullet-list-67"></i></a>
        <?php endif; ?>

        <?php if(auth()->check() && auth()->user()->hasRole('agent')): ?>
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?php echo e(route('agent.dashboard')); ?>"><i class="ni ni-bullet-list-67"></i></a>
        <?php endif; ?>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <?php if(auth()->guard()->guest()): ?>
        <?php else: ?>
        
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo e(asset('backend_template/assets/img/theme/team-4-800x800.jpg')); ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo e(Auth::user()->name); ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <?php echo e(__('Logout')); ?>

              </a>

              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
              </form>
            </div>
          </li>
        </ul>
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasRole('agent|preminum_agent')): ?>
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo e(asset('backend_template/assets/img/theme/team-4-800x800.jpg')); ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo e(Auth::user()->name); ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?php echo e(route('agent.profile')); ?>" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <?php echo e(__('Logout')); ?>

              </a>

              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
              </form>
            </div>
          </li>
        </ul>
        <?php endif; ?>
        <?php endif; ?>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-3 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
         <?php echo $__env->yieldContent('add'); ?>
        </div>
      </div>
    </div>
    <?php echo $__env->yieldContent('profile'); ?>
    <div class="container-fluid mt--7">
      
      <?php echo $__env->yieldContent('content'); ?>
     
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="<?php echo e(asset('backend_template/assets/js/plugins/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="<?php echo e(asset('backend_template/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>

  <script src="<?php echo e(asset('backend_template/assets/datatables/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('backend_template/assets/datatables/dataTables.bootstrap4.js')); ?>"></script>
  <!--   Optional JS   -->
  <script src="<?php echo e(asset('backend_template/assets/js/plugins/chart.js/dist/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend_template/assets/js/plugins/chart.js/dist/Chart.extension.js')); ?>"></script>
  <!--   Argon JS   -->
  <!-- <script src="<?php echo e(asset('template/assets/js/argon-dashboard.min.js?v=1.1.1')); ?>"></script> -->
  <!-- <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script> -->

  <!--  <script src="<?php echo e(asset('template/table/datatables/jquery.dataTables.min.js')); ?>"></script> -->
  <!-- <script src="<?php echo e(asset('template/table/datatables/dataTables.bootstrap4.min.js')); ?>"></script> -->

  <!-- Page level custom scripts -->
  <script src="<?php echo e(asset('backend_template/table/js/demo/datatables-demo.js')); ?>"></script>
  <script type="text/javascript" src=""></script>
  <script src="<?php echo e(asset('backend_template/table/datatables/icon.js')); ?>"></script>
  <script src="<?php echo e(asset('dist/js/select2.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('backend_template/assets/js/argon.min.js')); ?>"></script>
  <script>


    // window.$('table').DataTable();
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

     
      
  </script>

  <?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\Property_Laravel_Project\resources\views/backend/backend_template.blade.php ENDPATH**/ ?>