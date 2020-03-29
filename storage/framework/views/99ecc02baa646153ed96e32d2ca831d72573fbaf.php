
<?php $__env->startSection('content'); ?>
  
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Property <a href="<?php echo e(route('agent.property.index')); ?>" class="float-right"><i class="fas fa-backward"></i> back</a></h3>
      </div>

      <div class="card-body">
        <form method="post" id="updateButton" action="<?php echo e(route('agent.property.update',$property->id)); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <input type="hidden" name="property_id" id="property_id" value="<?php echo e($property->id); ?>">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <!-- Basic Detail -->
              <div class="card">
                <div class="card-header property-card">
                  Basic detail
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title" name="title" autofocus value="<?php echo e($property->title); ?>">

                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                             
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="status">Property Status</label><br>
                        <select name="status"  id="status" class="form-control">
                          <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($status->id); ?>" 
                                <?php if ($status->id == $property->status_id): echo "selected"; ?>
                                <?php endif ?>
                                ><?php echo e($status->status); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="col-6">
                        <label for="type">Property Type</label><br>
                        <select name="type"  id="type" class="form-control">
                          <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($type->id); ?>" 
                                <?php if ($type->id == $property->type_id): echo "selected"; ?>
                                <?php endif ?>
                                ><?php echo e($type->type); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>  
                    </div>        
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="bedroom">Bedroom</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['bedroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="bedroom" name="bedroom" autofocus value="<?php echo e($property->bedroom); ?>">

                        <?php $__errorArgs = ['bedroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-6">
                        <label for="bathroom">Bathroom</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['bathroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="bathroom" name="bathroom" autofocus value="<?php echo e($property->bathroom); ?>">

                        <?php $__errorArgs = ['bathroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>  
                    </div>        
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="garage">Garages</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['garage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="garage" name="garage" autofocus value="<?php echo e($property->garage); ?>">

                        <?php $__errorArgs = ['garage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-6">
                        <label for="build_year">Build Year</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['build_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="build_year" name="build_year" autofocus value="<?php echo e($property->build_year); ?>">

                        <?php $__errorArgs = ['build_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>  
                    </div>        
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="land_area">Land Area</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['land_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="land_area" name="land_area" autofocus value="<?php echo e($property->land_area); ?>">

                        <?php $__errorArgs = ['land_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="col-6">
                        <label for="building_area">Building Area</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['building_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="building_area" name="building_area" autofocus value="<?php echo e($property->building_area); ?>">

                        <?php $__errorArgs = ['building_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>  
                    </div>        
                  </div>

                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description" name="description" autofocus rows="8"><?php echo e($property->description); ?>

                    </textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="form-group">
                    <label for="keyword">Keyword</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="keyword" name="keyword" autofocus placeholder="CSV Format" value="<?php echo e($property->keyword); ?>">

                    <?php $__errorArgs = ['keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
              </div> 
            
              <!-- Price -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Price
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8 col-8">
                      <div class="form-group">
                        <label class="sr-only" for="price">Price</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">฿</div>
                          </div>
                          <input type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="price" placeholder="Price" name="price" value="<?php echo e($property->price); ?>">
                          <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto mt-2">
                      <a href="#" class="call-us text-primary d-none">Call Us</a>
                    </div>
                  </div>
                  <div class="col-auto my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="keepPrice">
                      <label class="custom-control-label" for="keepPrice">Keep Price Confidential</label>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Feature -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Feature
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php if($property->feature_id != "null"): ?>
                      <?php
                        $custom_features = json_decode($property->feature_id)
                      ?>
                      <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-4 col-sm-6 my-1">
                        <div class="custom-control custom-checkbox mr-sm-2">
                          <input type="checkbox" class="custom-control-input" id="<?php echo e($feature->feature); ?>" name="feature[]" multiple="multiple" value="<?php echo e($feature->id); ?>"
                          @<?php if (in_array($feature->id, $custom_features)): ?>
                              <?php echo "checked" ?>
                            <?php endif ?>
                          >
                          <label class="custom-control-label" for="<?php echo e($feature->feature); ?>"><?php echo e($feature->feature); ?></label>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php else: ?>
                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-6 my-1">
                          <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="<?php echo e($feature->feature); ?>" name="feature[]" multiple="multiple" value="<?php echo e($feature->id); ?>">
                            <label class="custom-control-label" for="<?php echo e($feature->feature); ?>"><?php echo e($feature->feature); ?></label>
                          </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              
              <!-- Tag -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Tags
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php if($property->tag_id != "null"): ?>
                    <?php
                      $custom_tags = json_decode($property->tag_id)
                    ?>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-6 col-sm-12 my-1">
                      <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="<?php echo e($tag->tag); ?>" name="tag[]" multiple="multiple" value="<?php echo e($tag->id); ?>"
                          @<?php if (in_array($tag->id, $custom_tags)): ?>
                            <?php echo "checked" ?>
                          <?php endif ?>
                        >
                        <label class="custom-control-label" for="<?php echo e($tag->tag); ?>"><?php echo e($tag->tag); ?></label>
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-6 col-sm-12 my-1">
                        <div class="custom-control custom-checkbox mr-sm-2">
                          <input type="checkbox" class="custom-control-input" id="<?php echo e($tag->tag); ?>" name="tag[]" multiple="multiple" value="<?php echo e($tag->id); ?>">
                          <label class="custom-control-label" for="<?php echo e($tag->tag); ?>"><?php echo e($tag->tag); ?></label>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>  
            </div>

            <div class="col-md-6 col-sm-12">
              <!-- Location -->
              <div class="card">
                <div class="card-header property-card">
                  Location
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" name="address" autofocus value="<?php echo e($location->address); ?>">

                      <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                      </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                               
                    <div class="form-group">
                      <div class="row">
                        <div class="col-12">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3851939.0559790777!2d94.47181513781126!3d19.470253532422557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305652a7714e2907%3A0xba7b0ee41c622b11!2sMyanmar%20(Burma)!5e0!3m2!1sen!2smm!4v1584077219243!5m2!1sen!2smm" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="longitude">Longitude</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="longitude" name="longitude" autofocus value="<?php echo e($location->longitude); ?>">

                          <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-6">
                          <label for="latitude">Latitude</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="latitude" name="latitude" autofocus value="<?php echo e($location->latitude); ?>">

                          <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>  
                      </div>        
                    </div>
                </div>
              </div> 
              
              <!-- Embed Code -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Video
                </div>
                <div class="card-body m-0">
                  <div class="card-body">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-old-embed-code-tab" data-toggle="tab" href="#nav-old-embed-code" role="tab" aria-controls="nav-old-embed-code" aria-selected="true">Old Video</a>
                      <a class="nav-item nav-link" id="nav-new-embed-code-tab" data-toggle="tab" href="#nav-new-embed-code" role="tab" aria-controls="nav-new-embed-code" aria-selected="false">New Video</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-old-embed-code" role="tabpanel" aria-labelledby="nav-old-embed-code-tab">
                      <input type="hidden" name="old-embed-code" value="<?php echo e($property->embed_code); ?>">
                      <div class="row mt-3">
                        <?php if($property->embed_code): ?>
                          <div class="col-md-12 col-12 img-fluid" id="embed_code">
                              <iframe src="<?php echo e($property->embed_code); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          </div>
                        <?php else: ?>
                          <div class="col-lg-8 col-md-8">
                            <button type="button" class="btn-icon-clipboard" data-clipboard-text="active-40" title="Copy to clipboard">
                              <div>
                                <span>Upload Your House Floor Now!!</span>
                                <i class="ni ni-active-40 ml-3"></i>
                              </div>
                            </button>
                          </div>
                        <?php endif; ?>
                      </div>  
                    </div>
                    <div class="tab-pane fade" id="nav-new-embed-code" role="tabpanel" aria-labelledby="nav-new-embed-code-tab">
                      <div class="form-group mt-3">
                        <input type="text" class="form-control <?php $__errorArgs = ['embed_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="embed_code" name="embed_code" autofocus value="" placeholder="Enter your Embed Code">

                        <?php $__errorArgs = ['embed_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                  </div>
                </div>
                  
                </div>
              </div>

               <!-- Floor Plan -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Floor Plan
                </div>
                <div class="card-body">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-old-floor-tab" data-toggle="tab" href="#nav-old-floor" role="tab" aria-controls="nav-old-floor" aria-selected="true">Old Image</a>
                      <a class="nav-item nav-link" id="nav-new-floor-tab" data-toggle="tab" href="#nav-new-floor" role="tab" aria-controls="nav-new-floor" aria-selected="false">New Image</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-old-floor" role="tabpanel" aria-labelledby="nav-old-floor-tab">
                      <?php if($floors != "[]"): ?>
                        <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                            $floors = json_decode($floor->floor_image);
                          ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <input type="hidden" name="old-floor" value="<?php echo e($floor->floor_image); ?>">
                      <div class="row mt-3">
                        <?php if($floors): ?>
                          <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-3">
                              <img src="<?php echo e(asset($floor_image)); ?>" class="edit-image img-fluid">
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>
                      <?php else: ?>
                        <div class="col-lg-12 col-md-12">
                            <button type="button" class="btn-icon-clipboard" data-clipboard-text="active-40" title="Copy to clipboard">
                              <div>
                                <span>Upload Your House Floor Now!!</span>
                                <i class="ni ni-active-40 ml-3"></i>
                              </div>
                            </button>
                          </div>
                      <?php endif; ?>  
                    </div>
                    <div class="tab-pane fade" id="nav-new-floor" role="tabpanel" aria-labelledby="nav-new-floor-tab">
                      <div class="form-group mt-3">
                        <div class="input-group mb-2">
                          <input type="file" class="form-control" id="inlineFormInputGroup" placeholder="" name="floor[]" multiple="multiple">
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Attachments -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Attachments
                </div>
                <div class="card-body">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-old-attachment-tab" data-toggle="tab" href="#nav-old-attachment" role="tab" aria-controls="nav-old-attachment" aria-selected="true">Old File</a>
                      <a class="nav-item nav-link" id="nav-new-attachment-tab" data-toggle="tab" href="#nav-new-attachment" role="tab" aria-controls="nav-new-attachment" aria-selected="false">New File</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-old-attachment" role="tabpanel" aria-labelledby="nav-old-attachment-tab">
                      <?php if($attachments != "[]"): ?>
                        <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                            $attachments = json_decode($attachment->file);
                          ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <input type="hidden" name="old-attachment" value="<?php echo e($attachment->file); ?>">
                      <div class="row mt-3">
                        <?php if($attachments): ?>
                          <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-3">
                              <p class="text-primary"><?php echo e($file); ?></p>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>
                      <?php else: ?>
                        <div class="col-lg-8 col-md-8">
                            <button type="button" class="btn-icon-clipboard" data-clipboard-text="active-40" title="Copy to clipboard">
                              <div>
                                <span>Upload Your File Now!!</span>
                                <i class="ni ni-active-40 ml-3"></i>
                              </div>
                            </button>
                          </div>
                      <?php endif; ?>  
                    </div>
                    <div class="tab-pane fade" id="nav-new-attachment" role="tabpanel" aria-labelledby="nav-new-attachment-tab">
                      <div class="form-group mt-3">
                        <div class="input-group mb-2">
                          <input type="file" class="form-control" id="inlineFormInputGroup" placeholder="" name="attachment[]" multiple="multiple">
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Gallery -->
              <div class="card mt-2">
                <div class="card-header property-card bg-transparent">
                  Gallery
                </div>
                <div class="card-body">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-old-gallery-tab" data-toggle="tab" href="#nav-old-gallery" role="tab" aria-controls="nav-old-gallery" aria-selected="true">Old Gallery</a>
                      <a class="nav-item nav-link" id="nav-new-gallery-tab" data-toggle="tab" href="#nav-new-gallery" role="tab" aria-controls="nav-new-gallery" aria-selected="false">New Gallery</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-old-gallery" role="tabpanel" aria-labelledby="nav-old-gallery-tab">
                      <?php if($galleries != "[]"): ?>
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                            $galleries = json_decode($gallery->gallery_image);
                          ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <input type="hidden" name="old-gallery" value="<?php echo e($gallery->gallery_image); ?>">
                      <div class="row mt-3 icon-examples">
                        <?php if($galleries): ?>
                          <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-2 col-3">
                              <img src="<?php echo e(asset($gallery_image)); ?>" class="edit-image img-fluid">
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>
                      <?php else: ?>
                          <div class="col-lg-8 col-md-8">
                            <button type="button" class="btn-icon-clipboard" data-clipboard-text="active-40" title="Copy to clipboard">
                              <div>
                                <span>Upload Your House Gallery Now!!</span>
                                <i class="ni ni-active-40 ml-3"></i>
                              </div>
                            </button>
                          </div> 
                      <?php endif; ?> 
                    </div>
                    <div class="tab-pane fade" id="nav-new-gallery" role="tabpanel" aria-labelledby="nav-new-gallery-tab">
                      <div class="form-group mt-3">
                        <div class="input-group mb-2 col-md-8 col-8">
                          <input type="file" class="form-control" id="inlineFormInputGroup" placeholder="" name="gallery[]" multiple="multiple">
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Neighborhood -->
            <div class="col-12">
              <!-- Neighborhood -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Neighborhoods
                </div>
                <div class="card-body m-0 ">
                  <p class="added-neighborhood p-2 text-md-left text-danger"></p>
                  <div class="row container-neighborhood">
                    <div class="col-3">
                      <div class="form-group">
                        <label for="place">Place</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['place'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> place" id="place" name="place" autofocus>

                        <?php $__errorArgs = ['place'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="min">Min</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['min'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> min" id="min" name="min" autofocus>
                        <?php $__errorArgs = ['min'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label for="transportation_type" class="d-block">Transportation</label>
                        <div class="row">
                          <?php $__currentLoopData = $transportations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transportation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-3 neighborhood-type">
                              <?php if($transportation->transportation_type == 'Bicycle'): ?>
                              <input type="hidden" name="transportation_type" value="<?php echo e($transportation->id); ?>" data-type="<?php echo e($transportation->transportation_type); ?>" class="bicycle">
                              <button type="button" class="btn btn-primary btn-sm d-inline-block float-right bicycle"><i class="fas fa-bicycle"></i></button>
                              <?php elseif($transportation->transportation_type == 'Train'): ?>
                              <input type="hidden" name="transportation_type" value="<?php echo e($transportation->id); ?>" data-type="<?php echo e($transportation->transportation_type); ?>" class="train">
                              <button type="button" class="btn btn-primary btn-sm d-inline-block  float-right transportation_type train"><i class="fas fa-train"></i></button>
                              <?php elseif($transportation->transportation_type == 'Car'): ?>
                              <input type="hidden" name="transportation_type" value="<?php echo e($transportation->id); ?>" data-type="<?php echo e($transportation->transportation_type); ?>" class="car">
                              <button type="button" class="btn btn-primary btn-sm d-inline-block float-right transportation_type car"><i class="fas fa-car"></i></button>
                              <?php elseif($transportation->transportation_type == 'Walking'): ?>
                              <input type="hidden" name="transportation_type" value="<?php echo e($transportation->id); ?>" data-type="<?php echo e($transportation->transportation_type); ?>" class="walking">
                              <button type="button" class="btn btn-primary btn-sm d-inline-block float-right transportation_type walking"><i class="fas fa-walking"></i></button>
                              <?php endif; ?>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-1" style="margin-top: 41px">
                      <button type="button" class="btn btn-primary btn-sm d-inline-block remove-neighborhood float-right"><i class="fas fa-times-circle"></i></button>
                    </div>
                  </div>
                  <p class="append-neighborhood d-inline d-none"></p>
                  <div class="row">
                   <div class="col-1 offset-11">
                     <button type="button" class="btn btn-primary btn-sm d-inline-block add-neighborhood float-right"><i class="fas fa-plus-circle"></i></button>
                   </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-6 col-lg-6" id="showOldNeighborhoodTable">
                      <label>Old Neighborhood</label>
                      <div class="table-responsive mt-3" >
                        <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Place</th>
                                    <th>Duration</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="showOldNeighborhoodTbody">
                                </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-6 col-6 col-lg-6" id="showNewNeighborhoodTable">
                      <label>New Neighborhood</label>
                      <div class="table-responsive mt-3" >
                        <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Place</th>
                                    <th>Duration</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="showNewNeighborhoodTbody">
                                </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- School -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Schools
                </div>
                <div class="card-body m-0">
                  <p class="added-school p-2 text-md-left text-danger"></p>
                  <div class="row container-school">
                    <div class="col-3">
                      <div class="form-group">
                        <input type="number" class="form-control <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rating" id="rating" name="rating" autofocus placeholder="Rating">

                        <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> name" id="name" name="name" autofocus placeholder="Name">

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <input type="text" class="form-control <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> grade" id="grade" name="grade" autofocus placeholder="Grade">

                        <?php $__errorArgs = ['grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <input type="text" class="form-control <?php $__errorArgs = ['distance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> distance" id="distance" name="distance" autofocus placeholder="distance">

                        <?php $__errorArgs = ['distance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-1" style="margin-top: 13px">
                      <button type="button" class="btn btn-primary btn-sm d-inline-block remove-school float-right"><i class="fas fa-times-circle"></i></button>
                    </div>
                  </div>
                  <p class="append-school d-inline d-none"></p>
                  <div class="row">
                    <div class="col-1 offset-11">
                     <button type="button" class="btn btn-primary btn-sm d-inline-block add-new-school float-right"><i class="fas fa-plus-circle"></i></button>
                   </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-6" id="showOldSchoolTable">
                      <label>Old Schools</label>
                      <div class="table-responsive mt-3" >
                        <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Name</th>
                                    <th>Rating</th>
                                    <th>Grade</th>
                                    <th>Distance</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="showOldSchoolTbody">
                                </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-6" id="showNewSchoolTable">
                      <label>New Schools</label>
                      <div class="table-responsive mt-3" >
                        <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Name</th>
                                    <th>Rating</th>
                                    <th>Grade</th>
                                    <th>Distance</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="showNewSchoolTbody">
                                </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Facts -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Facts
                </div>
                <div class="card-body m-0">
                  <p class="added-fact p-2 text-md-left text-danger"></p>
                  <div class="row container-fact">
                    <div class="col-11">
                      <div class="form-group">
                        <label for="fact">Facts</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['fact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> fact" id="fact" name="fact" autofocus>

                        <?php $__errorArgs = ['fact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-1" style="margin-top: 36px">
                      <button type="button" class="btn btn-primary btn-sm d-inline-block remove-fact float-right"><i class="fas fa-times-circle"></i></button>
                    </div>
                  </div>
                  <p class="append-fact d-inline d-none"></p>
                  <div class="row">
                   <div class="col-1 offset-11">
                     <button type="button" class="btn btn-primary btn-sm d-inline-block add-fact float-right"><i class="fas fa-plus-circle"></i></button>
                   </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-6" id="showOldFactTable">
                      <label>Old Facts</label>
                      <div class="table-responsive mt-3" >
                        <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                          <thead class="thead-light">
                            <tr>
                              <th>Fact</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="showOldFactTbody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-6" id="showNewFactTable">
                      <label>New Facts</label>
                      <div class="table-responsive mt-3" >
                        <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                  <tr>
                                    <th>Fact</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="showNewFactTbody">
                                </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" id="saveButton" class="btn btn-primary mt-2 float-right" value="submit">
        </form>
      </div>
    </div>
  </div>
</div>               
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $(document).ready(function () {
    $('#showOldNeighborhoodTable').hide()
    $('#showNewNeighborhoodTable').hide()
    $('#showOldSchoolTable').hide()
    $('#showNewSchoolTable').hide()
    $('#showOldFactTable').hide()
    $('#showNewFactTable').hide()
    $('.bicycle').addClass('current_type');

    var property_id = $('#property_id').val()
    getNeighborhood(property_id)
    getSchool(property_id)
    getFact(property_id)

    /*Neighborhood*/
    /*Remove Neighborhood*/
    $('.card-body').on('click', '.remove-neighborhood', function (argument) {
      $('.container-neighborhood').hide()
    })

    /*Get Old Neighborhood and Call ShowOldNeighborhoodTable*/
    var oldNeighborhoodListObj=null;
    function getNeighborhood(property_id) {
      var url="<?php echo e(route('agent.get_neighborhood_by_id')); ?>";
      $.ajax({
        url: url,
        type: "GET",
        data: {'property_id':property_id},
        dataType: 'json',
        success: function (data) {
            console.log(data)
            var oldNeighborhoodListObjLength = Object.keys(data).length
            console.log(oldNeighborhoodListObjLength)
            if (oldNeighborhoodListObjLength > 0) {
              oldNeighborhoodListObj = data
              showOldNeighborhoodTable(oldNeighborhoodListObj)
            }else{
              oldNeighborhoodListObj = data
            }
        },
        error: function (error) {
        }
      })
    }
      
    /*Show Neighborhood Function*/
    function showOldNeighborhoodTable(oldNeighborhoodListObj) {
      var html = ''
        var j = 1
        $.each(oldNeighborhoodListObj,function (i,v) {
          html += `<tr>
                    <td>${v.place}</td>
                    <td>${v.duration}</td>
                    <td>${v.transportation_id}</td>
                    <td><button type="button" class="btn btn-sm delete-neighborhood" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                  </td></tr>`
        })
        $('#showOldNeighborhoodTbody').html(html)
      $('#showOldNeighborhoodTable').show()
    }

    /*Delete Neighborhood By Id*/
    $('#showOldNeighborhoodTbody').on('click','.delete-neighborhood',function (argument) {
      var neighborhood_id = $(this).data("id")
      console.log(neighborhood_id)
      oldNeighborhoodListObj.splice(neighborhood_id, 1)
      var oldNeighborhoodListObjLength = Object.keys(oldNeighborhoodListObj).length
      console.log(oldNeighborhoodListObjLength)
      if(oldNeighborhoodListObjLength > 0){
          showOldNeighborhoodTable(oldNeighborhoodListObj)
      }
      else{
        console.log(oldNeighborhoodListObj)
        $('#showOldNeighborhoodTable').hide()
      }  
    })

    /*Add New Neighborhood and Call Show NewNeighborhoodTable*/
    var newNeighborhoodListString='{"newNeighborhoodList":[]}';
    var newNeighborhoodListObj=JSON.parse(newNeighborhoodListString);
    $('.add-neighborhood').click(function (argument) {
      var neighborhood_item_array = []
      var place = $('.place').val()
      var min = $('.min').val()
      var transportation_id = $('.current_type').val()
      var transportation_type = $('.current_type').data('type')
      console.log(place,min,transportation_type)
      if (place && min && transportation_type) {
        var newNeighborhood={place:place,min:min,transportation_id:transportation_id,transportation_type:transportation_type};
        newNeighborhoodListObj.newNeighborhoodList.push(newNeighborhood);
        $('.container-neighborhood').show()
        $('.added-neighborhood').text("You added one neighborhoods")
        $('.place').val('')
        $('.min').val('')
        showNewNeighborhoodTable(newNeighborhoodListObj)
      }
      else {
        $('.container-neighborhood').show()
        $('.added-neighborhood').text("Invalid Place or Duration or Transportation Type")
      }
    })
 
    /*Show Neighborhood Function*/
    function showNewNeighborhoodTable(newNeighborhoodListObj) {
      var html = ''
        var j = 1
        console.log(newNeighborhoodListObj)
        var newNeighborhood_array=newNeighborhoodListObj.newNeighborhoodList;
        $.each(newNeighborhood_array,function (i,v) {
          html += `<tr>
                    <td>${v.place}</td>
                    <td>${v.min}</td>
                    <td>${v.transportation_type}</td>
                    <td><button type="button" class="btn btn-sm delete-new-neighborhood" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                  </td></tr>`
        })
        $('#showNewNeighborhoodTbody').html(html)
      $('#showNewNeighborhoodTable').show()
    }

    /*Delete Neighborhood By Id*/
    $('#showNewNeighborhoodTbody').on('click','.delete-new-neighborhood',function (argument) {
      var new_neighborhood_id = $(this).data("id")
      console.log(new_neighborhood_id)
      newNeighborhoodListObj.newNeighborhoodList.splice(new_neighborhood_id, 1)
      var newNeighborhoodListObjLength = Object.keys(newNeighborhoodListObj.newNeighborhoodList).length
      console.log(newNeighborhoodListObjLength)
      if(newNeighborhoodListObjLength > 0){
          showNewNeighborhoodTable(newNeighborhoodListObj)
      }
    })

    /*School*/
    /*Remove School*/
    $('.card-body').on('click', '.remove-school', function (argument) {
      $('.container-school').hide()
    })

    /*Get Old School and Call ShowOldSchoolTable*/
    var oldSchoolListObj=null;
    function getSchool(property_id) {
      var url="<?php echo e(route('agent.get_school_by_id')); ?>";
      $.ajax({
        url: url,
        type: "GET",
        data: {'property_id':property_id},
        dataType: 'json',
        success: function (data) {
            console.log(data)
            var oldSchoolListObjLength = Object.keys(data).length
            console.log(oldSchoolListObjLength)
            if (oldSchoolListObjLength > 0) {
              oldSchoolListObj = data
              showOldSchoolTable(oldSchoolListObj)
            }else{
              oldSchoolListObj = data
            }
        },
        error: function (error) {
        }
      })
    }

    /*Show Old School Function*/
    function showOldSchoolTable(schoolListObj) {
      var html = ''
      var j = 1
      $.each(schoolListObj,function (i,v) {
        html += `<tr>
                  <td>${v.school_name}</td>
                  <td>${v.rating}</td>
                  <td>${v.grade}</td>
                  <td>${v.distance}</td>
                  <td><button type="button" class="btn btn-sm delete-old-school" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                </td></tr>`
      })
      $('#showOldSchoolTbody').html(html)
      $('#showOldSchoolTable').show()
    }

    /*Delete Old School By Id*/
    $('#showOldSchoolTbody').on('click','.delete-old-school',function (argument) {
      var school_id = $(this).data("id")
      oldSchoolListObj.splice(school_id, 1)
      var oldSchoolListObjLength = Object.keys(oldSchoolListObj).length
      console.log(oldSchoolListObjLength)
      if(oldSchoolListObjLength > 0){
          showOldSchoolTable(oldSchoolListObj)
      }
      else{
        $('#showOldSchoolTable').hide()
      }  
    })

    /*Add School and Call showOldSchoolTable*/
    var newSchoolListString='{"newSchoolList":[]}';
    var newSchoolListObj=JSON.parse(newSchoolListString);
    $('.add-new-school').click(function (argument) { 
      var rating = $('.rating').val()
      var name = $('.name').val()
      var grade = $('.grade').val()
      var distance = $('.distance').val()
      if (rating && name && grade && distance) {
        var school={rating:rating,name:name,grade:grade,distance:distance};
        newSchoolListObj.newSchoolList.push(school);
        $('.container-school').show()
        $('.added-school').text("You added one near school")
        $('.rating').val('')
        $('.name').val('')
        $('.grade').val('')
        $('.distance').val('')
        showNewSchoolTable(newSchoolListObj)
      }
      else {
        $('.container-school').show()
        $('.added-school').text("Invalid Rating or Name or Grade or Distance")
      }
    })

    /*Show School Function*/
    function showNewSchoolTable(newSchoolListObj) {
      var html = ''
      var j = 1
      var school_array=newSchoolListObj.newSchoolList;
      $.each(school_array,function (i,v) {
        html += `<tr>
                  <td>${v.name}</td>
                  <td>${v.rating}</td>
                  <td>${v.grade}</td>
                  <td>${v.distance}</td>
                  <td><button type="button" class="btn btn-sm delete-new-school" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                </td></tr>`
      })
      $('#showNewSchoolTbody').html(html)
      $('#showNewSchoolTable').show()
    }

    /*Delete new school By Id*/
    $('#showNewSchoolTbody').on('click','.delete-new-school',function (argument) {
      var school_id = $(this).data("id")
      newSchoolListObj.newSchoolList.splice(school_id, 1)
      var newSchoolListObjLength = Object.keys(newSchoolListObj.newSchoolList).length
      console.log(newSchoolListObjLength)
      if(newSchoolListObjLength > 0){
          showNewSchoolTable(newSchoolListObj)
      }
      else{
        $('#showNewSchoolTable').hide()
      }  
    })

    /*Fact*/
    /*Remove Fact*/
    $('.card-body').on('click', '.remove-fact', function (argument) {
      $('.container-fact').hide()
    })

    /*Get Old School and Call ShowOldSchoolTable*/
    var oldFactListObj=null;
    function getFact(property_id) {
      var url="<?php echo e(route('agent.get_fact_by_id')); ?>";
      $.ajax({
        url: url,
        type: "GET",
        data: {'property_id':property_id},
        dataType: 'json',
        success: function (data) {
            console.log(data)
            var oldFactListObjLength = Object.keys(data).length
            console.log(oldFactListObjLength)
            if (oldFactListObjLength > 0) {
              oldFactListObj = data
              showOldFactTable(oldFactListObj)
            }else{
              oldFactListObj = data
            }
        },
        error: function (error) {
        }
      })
    }

    /*Show Old Fact Function*/
    function showOldFactTable(oldFactListObj) {
      var html = ''
      var j = 1
      $.each(oldFactListObj,function (i,v) {
        html += `<tr>
                  <td>${v.fact}</td>
                  <td><button type="button" class="btn btn-sm delete-old-fact" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                </td></tr>`
      })
      $('#showOldFactTbody').html(html)
      $('#showOldFactTable').show()
    }

    /*Delete Old Fact By Id*/
    $('#showOldFactTbody').on('click','.delete-old-fact',function (argument) {
      var school_id = $(this).data("id")
      oldFactListObj.splice(school_id, 1)
      var oldFactListObjLength = Object.keys(oldFactListObj).length
      console.log(oldFactListObjLength)
      if(oldFactListObjLength > 0){
          showOldFactTable(oldFactListObj)
      }
      else{
        $('#showOldFactTable').hide()
      }  
    })

    /*Add Fact and Call ShowFactTable*/
    var newFactString='{"newFactList":[]}';
    var newFactListObj=JSON.parse(newFactString);
    $('.add-fact').click(function (argument) {
      var fact = $('.fact').val()
      if (fact) {
        var fact={fact:fact};
        newFactListObj.newFactList.push(fact);
        $('.container-fact').show()
        $('.fact').val('')
        $('.added-fact').text("You added one fact")
        showNewFactTable(newFactListObj)
      }
      else {
        $('.container-fact').show()
        $('.added-fact').text("Invalid Facts")
      }
    })

    /*Show Fact Function*/
    function showNewFactTable(newFactListObj) {
      var html = ''
        var j = 1
        var new_fact_array=newFactListObj.newFactList;
        $.each(new_fact_array,function (i,v) {
          html += `<tr>
                  <td>${v.fact}</td>
                  <td><button type="button" class="btn btn-sm delete-new-fact" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                  </td></tr>`
        })
        $('#showNewFactTbody').html(html)
      $('#showNewFactTable').show()
    }

    /*Delete Fact By Id*/
    $('#showNewFactTbody').on('click','.delete-new-fact',function (argument) {
      var fact_id = $(this).data("id")
      newFactListObj.newFactList.splice(fact_id, 1)
      var newFactListObjLength = Object.keys(newFactListObj.newFactList).length
      console.log(newFactListObjLength)
      if(newFactListObjLength > 0){
          showNewFactTable(newFactListObj)
      }
      else{
        $('#showNewFactTable').hide()
      } 
    })

    $('.card-body').on('click', '.train', function (argument) {
      $('.train').removeClass('transportation_type');
      $('.bicycle').addClass('transportation_type');
      $('.car').addClass('transportation_type');
      $('.walking').addClass('transportation_type');
      $('.train').addClass('current_type');
      $('.bicycle').removeClass('current_type');
      $('.car').removeClass('current_type');
      $('.walking').removeClass('current_type');
    })
    $('.card-body').on('click', '.bicycle', function (argument) {
      $('.train').addClass('transportation_type');
      $('.bicycle').removeClass('transportation_type');
      $('.car').addClass('transportation_type');
      $('.walking').addClass('transportation_type');
      $('.bicycle').addClass('current_type');
      $('.train').removeClass('current_type');
      $('.car').removeClass('current_type');
      $('.walking').removeClass('current_type');
    })
    $('.card-body').on('click', '.car', function (argument) {
      $('.train').addClass('transportation_type');
      $('.bicycle').addClass('transportation_type');
      $('.car').removeClass('transportation_type');
      $('.walking').addClass('transportation_type');
      $('.car').addClass('current_type');
      $('.bicycle').removeClass('current_type');
      $('.train').removeClass('current_type');
      $('.walking').removeClass('current_type');
    })
    $('.card-body').on('click', '.walking', function (argument) {
      $('.train').addClass('transportation_type');
      $('.bicycle').addClass('transportation_type');
      $('.car').addClass('transportation_type');
      $('.walking').removeClass('transportation_type');
      $('.walking').addClass('current_type');
      $('.bicycle').removeClass('current_type');
      $('.car').removeClass('current_type');
      $('.train').removeClass('current_type');
    })

    $('#keepPrice').click(function (argument) {
      $('.call-us').removeClass('d-none');
      $('.call-us').val(0);
    })

    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    })

    /*Save Property*/
    $('#updateButton').submit(function (e) {
      e.preventDefault()
      var formData = new FormData(this)
      formData.append("old_neighborhood_array",JSON.stringify(oldNeighborhoodListObj))
      formData.append("new_neighborhood_array",JSON.stringify(newNeighborhoodListObj))
      formData.append("old_school_array",JSON.stringify(oldSchoolListObj))
      formData.append("new_school_array",JSON.stringify(newSchoolListObj))
      formData.append("old_fact_array",JSON.stringify(oldFactListObj))
      formData.append("new_fact_array",JSON.stringify(newFactListObj))
      for (var pair of formData.entries())
        {
         console.log(pair[0]+ ', '+ pair[1]); 
        }
        var url="<?php echo e(route('agent.property.update',':id')); ?>";
        url=url.replace(':id',property_id);
      $.ajax({
          data: formData,
          url: url,
          type: "POST",
          dataType:'json',
          cache:false,
          contentType: false,
          processData: false,
          success: function (data) {
            $('#saveButton').trigger("reset")
            $('.alertMessage').removeClass('d-none')
            $('.alertMessage').text(data.success)
            window.location.href="<?php echo e(route('agent.property.index')); ?>"
          },
          error: function (error) {
            var errors=error.responseJSON.errors;
              if(errors){
                console.log(errors)
                  var title=errors.title[0];
                  var bedroom=errors.bedroom[0];
                  var bathroom=errors.bathroom[0];
                  var land_area=errors.land_area[0];
                  var building_area=errors.building_area[0];
                  var price=errors.price[0];
                  var address=errors.address[0];
                  var longitude=errors.longitude[0];
                  var latitude=errors.latitude[0];
                  console.log(title)
                  $('.error-message-title').text(title)
                  $('#title').addClass('border border-danger')
                  $('.error-message-bedroom').text(bedroom)
                  $('#bedroom').addClass('border border-danger')
                  $('.error-message-bathroom').text(bathroom)
                  $('#bathroom').addClass('border border-danger')
                  $('.error-message-land-area').text(land_area)
                  $('#land_area').addClass('border border-danger')
                  $('.error-message-building-area').text(building_area)
                  $('#building_area').addClass('border border-danger')
                  $('.error-message-price').text(price)
                  $('#price').addClass('border border-danger')
                  $('.error-message-address').text(address)
                  $('#address').addClass('border border-danger')
                  $('.error-message-longitude').text(longitude)
                  $('#longitude').addClass('border border-danger')
                  $('.error-message-latitude').text(latitude)
                  $('#latitude').addClass('border border-danger')
              }
          }
      })
    })

  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/backend/property/edit.blade.php ENDPATH**/ ?>