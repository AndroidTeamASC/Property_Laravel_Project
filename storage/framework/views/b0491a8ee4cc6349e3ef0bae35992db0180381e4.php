
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <a href="<?php echo e(route('agent.property.create')); ?>" class="btn btn-primary float-right">Add New Property</a>
        <h3 class="mb-0">Property tables</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Status</th>
                      <th>Type</th>
                      <th>Bedroom</th>
                      <th>Bathroom</th>
                      <th>Land Area</th>
                      <th>Building Area</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="medicineTable">
                    <?php $i=1;?>
                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($property->status->status); ?></td>
                        <td><?php echo e($property->type->type); ?></td>
                        <td><?php echo e($property->bedroom); ?></td>
                        <td><?php echo e($property->bathroom); ?></td>
                        <td><?php echo e($property->land_area); ?></td>
                        <td><?php echo e($property->building_area); ?></td>
                        <td><?php echo e($property->price); ?></td>
                        <td><a href="<?php echo e(route('agent.property.edit',$property->id)); ?>"><i class="btn fas fa-edit text-white"  style="background-color: #5e72e4"></i></a>
                      

                          <form method="post" action="<?php echo e(route('agent.property.destroy',$property->id)); ?>" class="d-inline-block">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn" style="background-color: #5e72e4"><i class="fas fa-trash text-white" ></i></button>
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

<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/backend/property/index.blade.php ENDPATH**/ ?>