
<?php $__env->startSection('content'); ?>
	
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Status <a href="<?php echo e(route('admin.status.index')); ?>" class="float-right"><i class="fas fa-backward"></i> back</a></h3>
      </div>

      <div class="card-body">
        <form method="post" action="<?php echo e(route('admin.status.update',$status->id)); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="row">
            <div class="col-6 offset-3 my-2">
              <div class="form-group">
                <label for="status">Name</label>
                <input type="text" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status" autofocus value="<?php echo e($status->status); ?>">

                <?php $__errorArgs = ['status'];
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
          <input type="submit" class="btn btn-primary col-2 offset-5" value="submit">
        </form>
      </div>
    </div>
  </div>
</div>
                    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/backend/status/edit.blade.php ENDPATH**/ ?>