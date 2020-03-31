
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xl-8">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Edit profile </h3>
          </div>
          <div class="alert alert-primary alertMessage d-none col-4 ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="col-4 text-right float-right">
            <a href="<?php echo e(route('agent.property.edit', $property->id)); ?>" class="btn btn-sm btn-primary">Edit Property</a>
          </div>
        </div>
      </div>
      <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Basic information</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Property Title
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->title); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Status
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->status->status); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Type
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->type->type); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Bedroom
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->bedroom); ?> rooms
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Bathroom
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->bathroom); ?> rooms
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Garage
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->garage); ?> garage
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Build Year
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->build_year); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Land Area
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->land_area); ?> sqft
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Building Area
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->building_area); ?> sqft
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Price
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                $ <?php echo e($property->price); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Descrption
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->description); ?>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Keyword
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                <?php echo e($property->keyword); ?>

              </div>
            </div>
          </div>
          <hr class="my-4" />
          <!-- Address -->
          <h6 class="heading-small text-muted mb-4">Neighborhoods</h6>
          <div class="pl-lg-4">
            <?php if($property->neighborhoods != "null"): ?>
              <?php
                $custom_neighborhoods = json_decode($property->neighborhoods)
              ?>
              <?php $__currentLoopData = $custom_neighborhoods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $neighborhood): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 h4 font-weight-300">
                  <?php echo e($neighborhood->place); ?>

                </div>
                <?php $__currentLoopData = $transportations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transportation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($neighborhood->transportation_id == $transportation->id): ?>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 h4 font-weight-300">
                      <?php echo $transportation->transportation_type; ?>
                  </div>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 h4 font-weight-300">
                  <?php echo e($neighborhood->duration); ?> min
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <?php endif; ?>
          </div>
          <hr class="my-4" />

          <h6 class="heading-small text-muted mb-4">Schools</h6>
          <div class="pl-lg-4">
            <?php if($property->schools != "null"): ?>
              <?php
                $schools = json_decode($property->schools)
              ?>
              <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 h4 font-weight-300">
                  <?php echo e($school->school_name); ?>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 h4 font-weight-300">
                  Grade <?php echo e($school->grade); ?>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 h4 font-weight-300">
                  Rating : <?php echo e($school->rating); ?>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 h4 font-weight-300">
                  <?php echo e($school->distance); ?> m
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <?php endif; ?>
          </div>

          <hr class="my-4" />
          <h6 class="heading-small text-muted mb-4">Facts</h6>
          <div class="pl-lg-4">
            <div class="row">
            <?php if($property->facts != "null"): ?>
              <?php
                $facts = json_decode($property->facts)
              ?>
              <?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 h4 font-weight-300">
                  <?php echo e($fact->fact); ?>

                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <?php endif; ?>
            </div>
          </div>
          <hr class="my-4" />
          <!-- Description -->
          <h6 class="heading-small text-muted mb-4">Property's Video</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <?php if($property->embed_code != null): ?>
                  <?php
                    echo "$property->embed_code";
                  ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4">
   <div class="row">
      <div class="card card-profile col-12">
        <div class="card-body pt-0">
          <div class="text-center">
            <div class="h3 font-weight-400 mt-3">
              <i class="ni location_pin mr-2"></i>Featured
            </div>
          </div>
        </div>
        <div class="row">
          <?php if($property->feature_id != "null"): ?>
            <?php
              $custom_features = json_decode($property->feature_id)
            ?>
            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <ul class="amenities">
                  
                  <?php if(in_array($feature->id, $custom_features)): ?>
                  <li class="h4 font-weight-300">
                      <?php echo $feature->feature; ?>
                  </li>
                  <?php endif; ?>
                </ul>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          <?php endif; ?>
        </div>
      </div>
   </div>
   <div class="row mt-3">
      <div class="card card-profile col-12">
        <div class="card-body pt-0">
          <div class="text-center">
            <div class="h3 font-weight-400 mt-3">
              <i class="ni location_pin mr-2"></i>Tags
            </div>
          </div>
        </div>
        <div class="row">
          <?php if($property->tag_id != "null"): ?>
            <?php
              $custom_tags = json_decode($property->tag_id)
            ?>
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <ul class="amenities"> 
                  <?php if(in_array($tag->id, $custom_tags)): ?>
                  <li class="h4 font-weight-300">
                      <?php echo $tag->tag; ?>
                  </li>
                  <?php endif; ?>
                </ul>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          <?php endif; ?>
        </div>
      </div>
   </div> 
   <div class="row mt-3">
    <div class="card card-profile col-12">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php $__currentLoopData = $property->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php
               $galleries = json_decode($gallery->gallery_image);
             ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php $i=0;
             ?>
             <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="carousel-item<?php echo e($i); ?>">
              <img src="<?php echo e(asset($gallery)); ?>" class="d-block w-100" alt="..." style="height: 150px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Galleries</h5>
              </div>
             </div>
             <?php $i++; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="card-body pt-0">
        <div class="text-center">
          <div class="h3 font-weight-400 mt-3">
            <i class="ni location_pin mr-2"></i>Gallery Image of Property
          </div>
        </div>
      </div>
    </div>
   </div>
   <div class="row mt-3">
    <div class="card card-profile col-12">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <?php
            if(count($property->floors) >0){
          ?> 
          <?php $__currentLoopData = $property->floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php
             $floors = json_decode($floor->floor_image);
             var_dump($property->floors);die();
           ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($floors != "null"): ?>
           <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="carousel-item<?php echo e($i); ?>">
              <img src="<?php echo e(asset($floor)); ?>" class="d-block w-100" alt="..." style="height: 150px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Floor</h5>
              </div>
             </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
         <?php
         }
         ?>     
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="card-body pt-0">
        <div class="text-center">
          <div class="h3 font-weight-400 mt-3">
            <i class="ni location_pin mr-2"></i>Floor Image of Property
          </div>
        </div>
      </div>
    </div>
   </div>
   <div class="row mt-3">
     <div class="card card-profile col-12">
      <div class="row">
        <?php
          if(count($property->attachments) >0){
        ?>
        <?php $__currentLoopData = $property->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php
           $attachments = json_decode($attachment->file);
         ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php $i=0;
         ?>
         <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="carousel-item<?php echo e($i); ?> col-6 mt-3">
          <a href="<?php echo e(asset($attachment)); ?>" download="download" class="btn btn-primary">Download File</a>
         </div>
         <?php $i++; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php
          }
        ?>
      </div>
      <div class="card-body pt-0">
        <div class="text-center">
          <div class="h3 font-weight-400 mt-3">
            <i class="ni location_pin mr-2"></i>Attachment Files
          </div>
        </div>
      </div>       
     </div>
   </div>
   
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".carousel-item0").addClass('active')
        });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/backend/property/detail.blade.php ENDPATH**/ ?>