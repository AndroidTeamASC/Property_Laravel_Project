<?php $__env->startSection('property'); ?>


    <div class="col-lg-8 col-md-12" id="property">
                <!-- Option bar start -->
             <!--    <div class="option-bar">
                    <div class="float-left">
                        <h4>
                            <span class="heading-icon">
                                <i class="fa fa-th-large"></i>
                            </span>
                            <span class="title-name">Properties Grid</span>
                        </h4>
                    </div>
                    <div class="float-right cod-pad">
                        <div class="sorting-options">
                            <select class="sorting">
                                <option>New To Old</option>
                                <option>Old To New</option>
                                <option>Properties (High To Low)</option>
                                <option>Properties (Low To High)</option>
                            </select>
                            <a href="properties-list-rightside.html" class="change-view-btn"><i class="fa fa-th-list"></i></a>
                            <a href="properties-grid-rightside.html" class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
                        </div>
                    </div>
                </div> -->
                <!-- Property section start -->
                <div class="row property-section ">
                   <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 filtr-item" >
                      
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="<?php echo e(route('property_detail',$property->id)); ?>" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price">
                                            <?php echo e($property->price); ?>

                                        </p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="listing-time opening"><?php echo e($property->status->status); ?></div>
                                    <img class="d-block w-100" src="<?php $__currentLoopData = $property->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php
                                         $galleries = json_decode($gallery->gallery_image);
                                       ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php echo e(asset($galleries[0])); ?>" alt="properties" style="height: 350px">
                                     <h1 class="title overlay">
                                        <a href="<?php echo e(route('property_detail',$property->id)); ?>" class="hover-text"><?php echo e($property->title); ?></a>
                                    </h1>
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="<?php echo e(route('property_detail',$property->id)); ?>"> 
                                       <?php echo e($property->title); ?>

                                    </a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="fa fa-map-marker"></i><?php echo e($property->location->address); ?>

                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-square"></i> <?php echo e($property->landarea); ?>

                                    </li>
                                    <li>
                                        <i class="flaticon-furniture"></i> <?php echo e($property->bedroom); ?>

                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i> <?php echo e($property->bathroom); ?>

                                    </li>
                                    <li>
                                        <i class="flaticon-vehicle"></i> <?php echo e($property->garage); ?>

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
                                    <a><i class="fa fa-user icon"></i> <?php echo e($property->agent->name); ?></a>
                                </div>
                                <div class="pull-right">
                                    <a><i class="flaticon-time icon"></i> <?php echo e($property->created_at->diffForHumans()); ?></a>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <?php echo $properties->render(); ?>

                            </li>
                          
                        </ul>
                    </nav>
                </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend/property_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Property_Laravel_Project/resources/views/frontend/property.blade.php ENDPATH**/ ?>