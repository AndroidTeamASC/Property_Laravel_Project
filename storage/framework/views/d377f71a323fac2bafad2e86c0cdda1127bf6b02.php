<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <h4 class="m-0 font-weight-bold text-primary">Type List
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTypeModal" id="createNewType">
        <i class="fas fa-plus"></i> Add Type
      </div>
      <div class="alert alert-primary alertMessage d-none float-left col-md-4 col-sm-2 offset-4">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tableBody">
                  </tbody>
          </table>
        </div>
    </div>
  </div> <!-- /table end -->



  <div class="modal fade" id="TypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
	      <form id="typeForm" name="typeForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="type_id" id="type_id">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modelHeading"></h5>
          
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
        <div class="modal-body">
	        <div class="container-fluid">
	          <div class="col-12 my-2">
              <div class="form-group row">
                  <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="type" name="type" autofocus required>
                      <p class="error-message p-2 text-md-left text-danger"></p>
                  </div>
                </div> 
            </div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary save" name="button" id="saveBtn"><i class="fas fa-save"></i></button>
	      </div>
	      </form>
    	</div>
  	</div>
	</div>

  <div class="modal fade" id="editTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <form method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PATCH'); ?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
      		<div class="container-fluid">
              <div class="col-6 offset-3 my-2">
                <div class="form-group">
                  <label for="editType">Type</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> editType" id="editType" name="type" autofocus required>
                  <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="invalid-feedback" role="alert">
                      <strong class="error-message"></strong>
                  </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div> 
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="button" id="btnUpdate"><i class="fas fa-save"></i> Update</button>
        </div>
        </form>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	$(document).ready(function(){

    getTypes()

    var myStopTimer = setInterval(Timer,3000)

		$.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  	});
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }

    function getTypes(){
      var url="<?php echo e(route('admin.get_type')); ?>";
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {
            var j=1;
            var html='';
            console.log(data);
            $.each(data,function(i,v){
              console.log(data)
              html+=`<tr>
                        <td>${j++}</td>
                        <td>${v.type}</td>
                        
                        <td>
                          <button class="btn btn-primary btn-sm d-inline-block editType " data-id="${v.id}"><i class="ni ni-settings"></i></button>
                          <button class="btn btn-danger btn-sm d-inline-block deleteType " data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>    
                        </td>
                      </tr>`;
            });
            $('#tableBody').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });  
    }

    $('#createNewType').click(function () {
        clearInterval(myStopTimer)
        $('#saveBtn').text("Save");
        $('#saveBtn').val("create-type");
        $('#type_id').val('');
        $('#typeForm').trigger("reset");
        $('#modelHeading').html("Create New Type");
        $('#TypeModal').modal('show');
    });   
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');   
        $.ajax({
          data: $('#typeForm').serialize(),
          url: "<?php echo e(route('admin.type.store')); ?>",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#typeForm').trigger("reset");
              $('#TypeModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getTypes()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var type=errors.type;
                  $('.error-message').text(type)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
  $('tbody').on('click', '.editType', function () {
      $('.alertMessage').addClass('d-none');
      var product_id = $(this).data('id');
      var url="<?php echo e(route('admin.type.edit',':id')); ?>";
      url=url.replace(':id',product_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (data) {
              $('#modelHeading').html("Edit Type");
              $('#saveBtn').val("edit-user");
              $('#saveBtn').text("Update");
              $('#TypeModal').modal('show');
              $('#type_id').val(data.id);
              $('#type').val(data.type);
          },
          error: function (error) {
          }
        })
   })
   $('body').on('click', '.deleteType', function () {
        clearInterval()
        var type_id = $(this).data("id");
        console.log(type_id);
        var status = confirm("Are You sure want to delete !");
        if (status) {
          var url="<?php echo e(route('admin.type.destroy',':id')); ?>";
          url=url.replace(':id',type_id);
          $.ajax({
              url: url,
              type: "DELETE",
              success: function (data) {
                console.log(data.error)
                $('.alertMessage').removeClass('d-none');
                if (data.success) {
                  $('.alertMessage').text(data.success);
                }else{
                  $('.alertMessage').text(data.error);
                } 
                getTypes()
                setInterval(Timer, 3000);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
        }
    }); 
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/backend/type/index.blade.php ENDPATH**/ ?>