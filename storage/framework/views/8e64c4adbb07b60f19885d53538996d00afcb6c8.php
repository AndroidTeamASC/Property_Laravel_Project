<?php $__env->startSection('property'); ?>

    <input type="hidden" name="property_id" id="property_id" value="<?php echo e($property->id); ?>">
    <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="properties-details-section">
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                        <!-- Heading properties start -->
                        <div class="heading-properties-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <h3><?php echo e($property->title); ?></h3>
                                        <p><i class="fa fa-map-marker"></i><?php echo e($property->location->address); ?></p>
                                    </div>
                                    <div class="pull-right">
                                        <h3><span class="text-right"><?php echo e($property->price); ?></span></h3>
                                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <?php $__currentLoopData = $property->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                      $galleries = json_decode($gallery->gallery_image);
                                      $key = 0;
                                    ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($galleries): ?>
                                  
                            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class=" item carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>" data-slide-number="<?php echo e($key); ?>">
                                   <img src="<?php echo e(asset($slider)); ?> " class="d-block w-100"  alt= "slider-properties"> 
                                  
                            </div>
                              <?php $key++; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                            
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                              <?php $__currentLoopData = $property->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                      $galleries = json_decode($gallery->gallery_image);
                                      $key = 0;
                                    ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php if($galleries): ?>
                                  
                                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li class="list-inline-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                                    <a id="carousel-selector-0" class="selected" data-slide-to="<?php echo e($key); ?>" data-target="#propertiesDetailsSlider">
                                         <img src="<?php echo e(asset($slider)); ?> " class="img-fluid"  alt= "properties-small"> 
                                    </a>
                                  </li>
                                  <?php $key++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            
                        </ul>
                        <!-- main slider carousel items -->
                    </div>
                    <!-- Advanced search start -->
                    <!-- <div class="widget-2 sidebar advanced-search-2">
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
                            <div class="form-group mb-0">
                                <button class="search-button">Search</button>
                            </div>
                        </form>
                    </div> -->
                    <!-- Tabbing box start -->
                    <div class="tabbing tabbing-box tb-2 mb-40">
                        <ul class="nav nav-tabs" id="carTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Floor Plans</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="true">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Similar Properties</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="carTabContent">
                            <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                <div class="properties-description mb-50">
                                    <h3 class="heading-2">
                                        Description
                                    </h3>
                                    <p><?php echo e($property->description); ?></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="floor-plans mb-50">
                                    <h3 class="heading-2">Floor Plans</h3>
                                    <table>
                                        <tbody><tr>
                                            <td><strong>Size</strong></td>
                                            <td><strong>Rooms</strong></td>
                                            <td><strong>Bathrooms</strong></td>
                                            <td><strong>Garage</strong></td>
                                        </tr>
                                        <tr>
                                            <td>1600</td>
                                            <td>3</td>
                                            <td>2</td>
                                            <td>1</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                       <?php if($property->floors != "[]"): ?>
                                    <?php $__currentLoopData = $property->floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                          $floors = json_decode($floor->floor_image);
                                          
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <img src="<?php echo e(asset($floors[0])); ?>" alt="floor-plans" class="img-fluid">
                                    <?php endif; ?>
                                   
                                </div>
                            </div>
                            <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                                <div class="property-details mb-40">
                                    <h3 class="heading-2">Property Details</h3>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <strong>Property Id:</strong>215
                                                </li>
                                                <li>
                                                    <strong>Price:</strong><?php echo e($property->price); ?>

                                                </li>
                                                <li>
                                                    <strong>Property Type:</strong><?php echo e($property->type->type); ?>

                                                </li>
                                                <li>
                                                    <strong>Bathrooms:</strong><?php echo e($property->bathroom); ?>

                                                </li>
                                                <li>
                                                    <strong>Bedrooms:</strong><?php echo e($property->bedroom); ?>

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <strong>Property Lot Size:</strong>800 ft2
                                                </li>
                                                <li>
                                                    <strong>Land area:</strong><?php echo e($property->land_area); ?>

                                                </li>
                                                <li>
                                                    <strong>Year Built:</strong><?php echo e($property->build_year); ?>

                                                </li>
                                                <li>
                                                    <strong>Available From:</strong>2018
                                                </li>
                                                <li>
                                                    <strong>Garages:</strong><?php echo e($property->garage); ?>

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <ul>
                                                <li>
                                                    <strong>Property Status:</strong><?php echo e($property->property_status); ?>

                                                </li>
                                                <li>
                                                    <strong>City:</strong>Usa
                                                </li>
                                                <li>
                                                    <strong>Parking:</strong>Yes
                                                </li>
                                                <li>
                                                    <strong>Property Owner:</strong>Sohel Rana
                                                </li>
                                                <li>
                                                    <strong>Zip Code: </strong>2451
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
                                <div class="inside-properties mb-50">
                                    <h3 class="heading-2">
                                        Property Video
                                    </h3>
                                    
                                      <?php echo $property->embed_code; ?>

                                     
                                </div>
                            </div>
                            <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
                                <div class="row">
                                   <div class="location col-md-12"  >
                                     
                                        <h3 class="heading-2">Property Location</h3>
                                         <div id="map" >
                                             
                                         </div>
                                    
                                </div> 
                                </div>
                                
                            </div>
                            <div class="tab-pane fade " id="6" role="tabpanel" aria-labelledby="6-tab">
                                <div class="similar-properties mb-30">
                                    <h3 class="heading-2">Similar Properties</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="properties-details.html" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured">Featured</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price">
                                                                $178,000
                                                            </p>
                                                            <div class="ratings">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="listing-time opening">For Sale</div>
                                                        <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <h1 class="title">
                                                        <a href="properties-details.html">Modern Family Home</a>
                                                    </h1>
                                                    <div class="location">
                                                        <a href="properties-details.html">
                                                            <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City
                                                        </a>
                                                    </div>
                                                    <ul class="facilities-list clearfix">
                                                        <li>
                                                            <i class="flaticon-square"></i> 4800 sq ft
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-furniture"></i> 3 Beds
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-holidays"></i> 2 Baths
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-vehicle"></i> 1 Garage
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-window"></i> 3 Balcony
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-monitor"></i> TV
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="footer clearfix">
                                                    <div class="pull-left days">
                                                        <a><i class="fa fa-user"></i> Jhon Doe</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a><i class="flaticon-time"></i> 5 Days ago</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <a href="properties-details.html" class="property-img">
                                                        <div class="listing-badges">
                                                            <span class="featured">Featured</span>
                                                        </div>
                                                        <div class="price-ratings-box">
                                                            <p class="price">
                                                                $178,000
                                                            </p>
                                                            <div class="ratings">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="listing-time opening">For Rent</div>
                                                        <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                                                    </a>
                                                </div>
                                                <div class="detail">
                                                    <h1 class="title">
                                                        <a href="properties-details.html">Relaxing Apartment</a>
                                                    </h1>
                                                    <div class="location">
                                                        <a href="properties-details.html">
                                                            <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City
                                                        </a>
                                                    </div>
                                                    <ul class="facilities-list clearfix">
                                                        <li>
                                                            <i class="flaticon-square"></i> 4800 sq ft
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-furniture"></i> 3 Beds
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-holidays"></i> 2 Baths
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-vehicle"></i> 1 Garage
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-window"></i> 3 Balcony
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-monitor"></i> TV
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="footer clearfix">
                                                    <div class="pull-left days">
                                                        <a><i class="fa fa-user"></i> Jhon Doe</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a><i class="flaticon-time"></i> 5 Days ago</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Properties condition start -->
                    <div class="properties-condition mb-40">
                        <h3 class="heading-2">
                            Condition
                        </h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <ul class="condition">
                                    <li>
                                        <i class="flaticon-furniture"></i>2 Bedroom
                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i>Bathroom
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <ul class="condition">
                                    <li>
                                        <i class="flaticon-square"></i>4800 sq ft
                                    </li>
                                    <li>
                                        <i class="flaticon-monitor"></i>TV Lounge
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <ul class="condition">
                                    <li>
                                        <i class="flaticon-vehicle"></i>1 Garage
                                    </li>
                                    <li>
                                        <i class="flaticon-window"></i>Balcony
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Properties amenities start -->
                    <div class="properties-amenities mb-40">
                        <h3 class="heading-2">
                            Features
                        </h3>
                        <div class="row">
                             <?php if($property->feature_id != "null"): ?>
                              <?php
                                $custom_features = json_decode($property->feature_id)
                              ?>
                              <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                  <ul class="amenities">
                                    
                                    <?php if(in_array($feature->id, $custom_features)): ?>
                                    <li>
                                        <?php echo $feature->feature; ?>
                                    </li>
                                    <?php endif; ?>
                                  </ul>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <?php endif; ?> 
                            
                        </div>
                    </div>
                    <?php if(Auth::check()): ?>
                    <h3 class="heading-2">Comments Here</h3>
                    <div class="row clearfix">
                        <div class="alert alert-primary alertMessage d-none float-left col-md-4 col-sm-2 offset-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea type="text" class="text-area form-control" id="comment" name="comment" autofocus rows="5" data-id="<?php echo e($property->id); ?>">
                            </textarea>
                        </div>
                    </div>
                    <?php endif; ?>
                    <h3 class="heading-2 mt-5">Comments Section</h3>
                    <!-- Comments start -->
                    <ul class="comments" id="comments">
                        
                    </ul>
                    <br>
                    <!-- Contact 1 start -->
                    <div class="contact-1 mtb-50">
                        <h3 class="heading">Contact Form</h3>
                        <form action="#" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group name">
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group email">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" name="phone" class="form-control" placeholder="Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group message">
                                        <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-md button-theme">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">

  $(document).ready(function () {
    getComment()
    var myStopTimer = setInterval(Timer,3000)

    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    })

    var property_id = $('#property_id').val()
     getMap();

    function getMap(){
       
    var url="<?php echo e(route('get_maps')); ?>";
        $.ajax({
          type:'GET',
          url: url,
          data: {'property_id':property_id},
          // processData: false,
          // contentType: false,
           dataType: 'json',
          success: (data) => {

            var saved_markers = data;
            
              var lat = saved_markers[0].latitude
              var lng = saved_markers[0].longitude
           
        console.log("Map=> "+lat);
        var user_location = [lng,lat];
        mapboxgl.accessToken ='pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v8',
            center: user_location,
            zoom: 10
        });
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                alert("aaaaa");
                console.log(ev.result.center);

            });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                // console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat(marker)
                    .addTo(map);
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            // console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

         

        document.getElementById('map');

          }
          });
    }


    function Timer() {
     $('.alertMessage').addClass('d-none');
    }

    function getComment(){
        var property_id = $('#comment').data('id');
        var url="<?php echo e(route('get_comment')); ?>";
        $.ajax({
          type:'get',
          url: url,
          data: {'property_id':property_id},
          success: (data) => {
            var j=1;
            var html='';
            console.log(data);
            $.each(data.comments,function(i,v){
              html+=`<li>
                        <div class="comment">
                            <div class="comment-author">
                                <a href="#">
                                    <img src="<?php echo e(asset('${v.image}')); ?>" alt="comments-user">
                                </a>
                            </div>
                            <div class="comment-content" id="parent${v.c_id}">
                                <div class="comment-meta" id="meta2">
                                    <h3>
                                        ${v.name}
                                    </h3>
                                    <div class="comment-meta" id="meta">
                                        ${v.created_at}<a href="javascript:void(0)" class="comment_reply" data-id="${v.c_id}">Reply</a>
                                    </div>
                                </div>
                                <p>${v.comment}</p>
                            </div>
                        </div>`;

                        $.each(data.reply_comments,function (j,k) {
                            console.log(j,k)
                            if (v.c_id == k.comment_id) {
                                html+= ` <ul>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="<?php echo e(asset('${k.image}')); ?>" alt="comments-user">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <h3>
                                                ${k.name}
                                            </h3>
                                            <div class="comment-meta">
                                                ${k.created_at}
                                            </div>
                                        </div>
                                        <p>${k.comment}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>`
                            }
                        })
                        
                    html+= `</li>`;
            });
            $('#comments').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });  
    } 
    $('#comment').change(function () {
        var comment = $(this).val();
        var property_id = $('#comment').data('id');
        $.ajax({
          data: {'comment':comment, 'property_id':property_id},
          url: "<?php echo e(route('comment.store')); ?>",
          type: "POST",
          success: function (data) {
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getComment();
              setInterval(Timer, 3000);
              $('#comment').val('');
          },
          error: function (error) {
          }
      })
    })
     $('#comments').on('click','.comment_reply',function (argument) {
        var comment_id = $(this).data('id')
        var html = `<div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea type="text" class="text-area form-control" id="comment${comment_id}" name="comment" autofocus rows="3" data-id="<?php echo e($property->id); ?>">
                            </textarea>
                        </div>
                    </div>`
        $("#parent"+comment_id).append(html)
        $('#comments').on('change','#comment'+comment_id,function (argument) {
        var comment = $(this).val();
            $.ajax({
              data: {'comment':comment, 'comment_id':comment_id},
              url: "<?php echo e(route('comment_reply.store')); ?>",
              type: "POST",
              success: function (data) {
                  console.log(data)
                  $('.alertMessage').removeClass('d-none');
                  $('.alertMessage').text(data.success);
                  getComment();
                  setInterval(Timer, 3000);
                  $("#parent"+comment_id).hide()
              },
              error: function (error) {
              }
          })
        })
    }) 
  })

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend/property_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Property_Laravel_Project\resources\views/frontend/property_detail.blade.php ENDPATH**/ ?>