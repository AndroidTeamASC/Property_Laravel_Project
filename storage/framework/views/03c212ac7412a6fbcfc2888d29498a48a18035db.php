<?php $__env->startSection('banner'); ?>
    <div class="banner" id="banner">
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item banner-max-height active">
                    <img class="d-block w-100 h-75" src="<?php echo e(asset('frontend_template/img/banner-1.jpg')); ?>" alt="banner">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="carousel-content container">
                            <div class="text-center">
                                <h3 class="text-uppercase">Find Your Dream House</h3>
                                <p class="none-mb-992-0">
                                    This is real estate website template based on Bootstrap 4 framework.
                                </p>
                                <div class="inline-search-area none-992">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-4 col-6 search-col">
                                            <select class="selectpicker search-fields" name="property-status" id="status">
                                                <option>Property Status</option>
                                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($status->id); ?>"><?php echo e($status->status); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-sm-3 col-6 search-col middle-col-1">
                                            <select class="selectpicker search-fields" name="property-types" id="type">
                                                <option>Property Type</option>
                                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type->id); ?>"><?php echo e($type->type); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-sm-3 col-6 search-col middle-col-1">
                                            <select class="selectpicker search-fields" name="Bedrooms" id="bedroom">
                                                <option>Bedrooms</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="above3">Above 03</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-sm-3 col-8 search-col middle-col-2">
                                            <select class="selectpicker search-fields" name="Bathrooms" id="bathroom">
                                                <option>Bathrooms</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="above3">Above 03</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-sm-3 col-8 search-col middle-col-2">
                                            <input type="text" name="name" class="form-control selectpicker" placeholder="Keyword..." style="font-size: 14px;font-weight: 300;" id="keyword">
                                        </div>
                                        <div class="col-lg-2 col-sm-2 col-4 search-col">
                                            <button class="btn button-theme btn-search btn-block" id="search">
                                                <i class="fa fa-search"></i><strong>Find</strong>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('search_properties'); ?>
<div class="our-team-2 content-area" id="search_properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Search Properties</h1>
        </div>
        <div class="row" id="search_properties_area">
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('featured_properties'); ?>
    <div class="featured-properties content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title mt2">
                <h1>Featured Properties</h1>
                <div class="list-inline-listing">
                    <ul class="filters filteriz-navigation clearfix">
                        <li class="active btn filtr-button filtr" data-filter="all">All</li>
                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-filter="<?php echo e($type->id); ?>" class="btn btn-inline filtr-button filtr"><?php echo e($type->type); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="row filter-portfolio">
                <div class="cars">
                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="<?php echo e($property->type_id); ?>">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="<?php echo e(route('property_detail',$property->id)); ?>" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price">
                                            $<?php echo e($property->price); ?>

                                        </p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="listing-time opening"><?php echo e($property->status->status); ?> </div>
                                    
                                    <img class="d-block w-100 image" src="<?php $__currentLoopData = $property->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php
                                         $galleries = json_decode($gallery->gallery_image);
                                       ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php echo e($galleries[0]); ?>" alt="properties" style="height: 350px">
                                     <h1 class="title overlay">
                                    <a href="<?php echo e(route('property_detail',$property->id)); ?>" class="hover-text"><?php echo e($property->title); ?></a>
                                </h1>
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="<?php echo e(route('property_detail',$property->id)); ?>" class=""><?php echo e($property->title); ?></a>
                                </h1>
                                <div class="location">
                                    <a href="<?php echo e(route('property_detail',$property->id)); ?>">
                                        <i class="fa fa-map-marker"></i><?php echo e($property->location->address); ?>

                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-square"></i> <?php echo e($property->building_area); ?> sq ft
                                    </li>
                                    <li>
                                        <i class="flaticon-furniture"></i> <?php echo e($property->bedroom); ?> Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i> <?php echo e($property->bathroom); ?> Baths
                                    </li>
                                    <li>
                                        <i class="flaticon-vehicle"></i> 
                                        <?php
                                            $garage = $property->garage;
                                            if($garage == null){
                                                $garage = 0;
                                            }
                                            
                                        ?>
                                        <?php echo e($garage); ?> Garage
                                    </li>
                                    <li>
                                        <i class="flaticon-window"></i> <?php echo e($property->build_year); ?>

                                    </li>
                                    <li>
                                        <i class="flaticon-monitor"></i> TV
                                    </li>
                                </ul>
                            </div>
                            <div class="footer clearfix">
                                <div class="pull-left days">
                                    <a><i class="fa fa-user"></i> <?php echo e($property->agent->name); ?></a>
                                </div>
                                <div class="pull-right">
                                    <a><i class="flaticon-time"></i> <?php echo e($property->created_at->diffForHumans()); ?> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('services'); ?>
    <div class="services-3 content-area-5 bg-grea-3">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>What are you looking for?</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-info-2">
                        <div class="s-info">
                            <i class="flaticon-apartment"></i>
                            <span>Apartments</span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-info-2">
                        <div class="s-info">
                            <i class="flaticon-internet"></i>
                            <span>Houses</span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-info-2">
                        <div class="s-info">
                            <i class="flaticon-vehicle"></i>
                            <span>Garages</span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-info-2">
                        <div class="s-info">
                            <i class="flaticon-coins"></i>
                            <span>Commercial</span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                    </div>
                </div>
            </div>
            <div class="text-center read-more-2">
                <a href="services-1.html" class="btn-white">Read More</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('recent_properties'); ?>
    <div class="recently-properties content-area-12">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Recently Properties</h1>
            </div>
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <?php $__currentLoopData = $recent_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slick-slide-item">
                        <div class="property-box-5">
                            <div class="property-photo">
                                
                                <img class="img-fluid image" src="<?php $__currentLoopData = $recent_property->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php
                                         $galleries = json_decode($gallery->gallery_image);
                                       ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php echo e($galleries[0]); ?>" alt="properties" style="height: 300px">
                                     
                                <div class="date-box"><?php echo e($recent_property->status->status); ?></div>
                            </div>
                            <div class="detail">
                                <div class="heading">
                                    <h3>
                                        <a href="<?php echo e(route('property_detail',$property->id)); ?>"><?php echo e($recent_property->title); ?></a>
                                    </h3>
                                    <div class="location">
                                        <a href="<?php echo e(route('property_detail',$property->id)); ?>">
                                            <i class="fa fa-map-marker"></i><?php echo e($recent_property->location->address); ?>

                                        </a>
                                    </div>
                                </div>
                                <div class="properties-listing">
                                    <span><?php echo e($recent_property->bedroom); ?> Beds</span>
                                    <span><?php echo e($recent_property->bathroom); ?> Baths</span>
                                    <span><?php echo e($recent_property->building_area); ?> sqft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="slick-btn">
                    <div class="slick-prev slick-arrow-buton-2"></div>
                    <div class="slick-next slick-arrow-buton-2"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('categories'); ?>
    <div class="categories content-area-8 bg-grea-3">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Most Popular Places</h1>
            </div>
            <div class="row wow">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">House</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle"><?php echo e($listing_houses); ?> Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Apartment</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle"><?php echo e($listing_apartments); ?> Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Office</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle"><?php echo e($listing_offices); ?> Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-pad d-none d-xl-block d-lg-block">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">Vialla</a>
                                </h3>
                                <a href="properties-list-rightside.html" class="category-subtitle"><?php echo e($listing_villas); ?> Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('counters'); ?>
    <div class="counters-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-box">
                        <div class="icon"><i class="flaticon-tag"></i></div>
                        <h1 class="counter"><?php echo e($listing_sale); ?></h1>
                        <p>Listings For Sale</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-business"></i>
                        </div>
                        <h1 class="counter"><?php echo e($listing_rent); ?></h1>
                        <p>Listings For Rent</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-people"></i>
                        </div>
                        <h1 class="counter"><?php echo e($agent); ?></h1>
                        <p>Agents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('team'); ?>
    <div class="our-team-2 content-area">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>Our Agent</h1>
                </div>
                <div class="slick-slider-area">
                    <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                        <?php $__currentLoopData = $our_agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($agent->hasRole('agent')): ?>
                        <div class="slick-slide-item">
                            <div class="row team-4">
                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-pad ">
                                    <div class="photo">
                                        <img src="<?php echo e(asset($agent->image)); ?>" class="img-fluid" style="height: 300px">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-pad align-self-center">
                                    <div class="detail">
                                        <h5>Office Manager</h5>
                                        <h4>
                                            <a href="agent-detail.html"><?php echo e($agent->name); ?></a>
                                        </h4>

                                        <div class="contact">
                                            <ul>
                                                <li>
                                                    <span>Address:</span><a href="#"> <?php echo e($agent->address); ?></a>
                                                </li>
                                                <li>
                                                    <span>Email:</span><a href="mailto:<?php echo e($agent->email); ?>"> <?php echo e($agent->email); ?></a>
                                                </li>
                                                <li>
                                                    <span>Mobile:</span><a href="tel:+554XX-634-7071"> <?php echo e($agent->phone_no); ?></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <ul class="social-list clearfix">
                                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="slick-prev slick-arrow-buton">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="slick-next slick-arrow-buton">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('testimonial'); ?>
    <div class="testimonial-2 t2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="testimonial-inner">
                        <header class="testimonia-header">
                            <h1>Our Testimonial</h1>
                        </header>
                        <div id="carouselExampleIndicators4" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators4" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators4" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators4" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="lead">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.
                                    </p>
                                    <div class="media mb-4">
                                        <a class="pr-3" href="#">
                                            <img src="http://placehold.it/50x50" alt="use" class="img-fluid">
                                        </a>
                                        <div class="media-body align-self-center">
                                            <h5>
                                                <a href="#">Anne Brady</a>
                                            </h5>
                                            <h6>Creative Director</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <p class="lead">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.
                                    </p>
                                    <div class="media mb-4">
                                        <a class="pr-3" href="#">
                                            <img src="http://placehold.it/50x50" alt="use" class="img-fluid">
                                        </a>
                                        <div class="media-body align-self-center">
                                            <h5>
                                                <a href="#">Eliane Perei</a>
                                            </h5>
                                            <h6>Web Developer</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <p class="lead">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.
                                    </p>
                                    <div class="media mb-4">
                                        <a class="pr-3" href="#">
                                            <img src="http://placehold.it/50x50" alt="use" class="img-fluid">
                                        </a>
                                        <div class="media-body align-self-center">
                                            <h5>
                                                <a href="#">Maria Blank</a>
                                            </h5>
                                            <h6>Office Manager</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('blog'); ?>
    <div class="blog content-area-12">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Our Blog</h1>
            </div>
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slick-slide-item">
                        <div class="row blog-2">
                            <div class="col-lg-6 col-md-12 col-pad">
                                <div class="photo">
                                    <img src="<?php echo e(asset($post->image)); ?>" alt="blog" class="img-fluid fit-cover" style="height: 350px">
                                    <div class="date-box">
                                        <?php echo e($post->created_at->diffForHumans()); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-pad align-self-center">
                                <div class="detail">
                                    <h3>
                                        <a href="<?php echo e(route('blog_detail',$post->id)); ?>"><?php echo e($post->title); ?></a>
                                    </h3>
                                    <div class="post-meta">
                                        <span><a href="#"><i class="fa fa-user"></i><?php echo e($post->user->name); ?></a></span>
                                        <span><a href="#"><i class="fa fa-clock-o"></i>237</a></span>
                                        <span><a href="#"><i class="fa fa-heart-o"></i>548</a></span>
                                    </div>
                                    <p><?php echo e(Str::limit($post->context, 150)); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="slick-btn">
                    <div class="slick-prev slick-arrow-buton-2"></div>
                    <div class="slick-next slick-arrow-buton-2"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('partners'); ?>
    <div class="partners">
        <div class="container">
            <h4>Brands and Partners</h4>
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                </div>
                <div class="slick-prev slick-arrow-buton">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="slick-next slick-arrow-buton">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function (argument) {
            jQuery("time.timeago").timeago();
            $('#search_properties').hide()
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              }
            })
            $('#search').click(function (argument) {
                var status = $('#status').val()
                var type = $('#type').val()
                var bedroom = $('#bedroom').val()
                var bathroom = $('#bathroom').val()
                var keyword = $('#keyword').val()
                console.log(status,type,bedroom,bathroom,keyword)
                var url="<?php echo e(route('home_search')); ?>"
                $.ajax({
                  type:'POST',
                  url: url,
                  data: {'status':status, 'type':type, 'bedroom':bedroom, 'bathroom':bathroom, 'keyword':keyword},
                  success: (data) => {
                    var j=1;
                    var html='';
                    $.each(data,function(i,v){
                      console.log(data);
                      var gallery_images = JSON.parse(v.gallery_image);
                      var gallery_image = gallery_images[0];
                      var garage = v.garage;
                      if (garage == null) {
                        garage = 0;
                      }
                      var build_year = v.build_year;
                      if (build_year == null) {
                        build_year = '';
                      }
                      console.log(gallery_image)
                      var date = jQuery.timeago(v.created_at); 
                      html+=`<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        ${v.price}
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <div class="listing-time opening">${v.status}</div>
                                <img class="d-block w-100" src="<?php echo e(asset('${gallery_image}')); ?>" style="height:350px">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">${v.title}</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>${v.address}
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square"></i> ${v.building_area} sq ft
                                </li>
                                <li>
                                    <i class="flaticon-furniture"></i> ${v.bedroom} Beds
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i> ${v.bathroom} Baths
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i> ${garage} Garage
                                </li>
                                <li>
                                    <i class="flaticon-window"></i> ${build_year} 
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i> TV
                                </li>
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <a><i class="fa fa-user"></i> ${v.name}</a>
                            </div>
                            <div class="pull-right">
                                <a><i class="flaticon-time"></i> ${date}</a>
                            </div>
                        </div>
                    </div>
                        </div>`;
                    });
                    $('#search_properties_area').html(html);  
                    $('#search_properties').show()
                  },
                  error: function(error){
                    console.log(error)
                  }
              })
            }) 
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Property_Laravel_Project\resources\views/frontend/index.blade.php ENDPATH**/ ?>