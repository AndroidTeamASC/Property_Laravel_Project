
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <a href="<?php echo e(route('admin.status.create')); ?>" class="btn btn-primary float-right">Add New Status</a>
        <h3 class="mb-0">Status tables</h3>
      </div>
      <?php if($errors->any()): ?>
        <div class="alert alert-warning alert-dismissible fade show col-6 offset-3" role="alert">
          <strong><?php echo e($errors->first()); ?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Father Name</th>
                    </tr>
                  </thead>
                  <tbody id="statusTable">
                    <?php $i=1;?>
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($status->status); ?></td>
                        <td><a href="<?php echo e(route('admin.status.edit',$status->id)); ?>"><i class="btn-sm fas fa-edit text-white"  style="background-color: #5e72e4"></i></a>
                      

                          <form method="post" action="<?php echo e(route('admin.status.destroy',$status->id)); ?>" class="d-inline-block">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>  
                            <button type="submit" class="btn btn-danger btn-sm d-inline-block" ><i class="ni ni-fat-delete" ></i></button>
                          </form>
                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
 
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/backend/status/index.blade.php ENDPATH**/ ?>