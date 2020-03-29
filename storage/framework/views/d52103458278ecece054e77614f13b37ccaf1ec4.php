<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <h4 class="m-0 font-weight-bold text-primary">Tag List
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTypeModal" id="createNewTag">
        <i class="fas fa-plus"></i> Add Tag
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



  <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
	      <form id="typeForm" name="typeForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="tag_id" id="tag_id">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modelHeading"></h5>
          
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
        <div class="modal-body">
	        <div class="container-fluid">
	          <div class="col-6 offset-3 my-2">
              <div class="form-group">
                <label for="type">Tag</label>
                <input type="text" class="form-control <?php $__errorArgs = ['tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tag" name="tag" autofocus required>
                  <p class="error-message p-2 text-md-left text-danger"></p>
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

  <div class="modal fade" id="editTagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    getTags()
    var myStopTimer = setInterval(Timer,3000)
		$.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  	});
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }
    function getTags(){
      var url="<?php echo e(route('admin.get_tag')); ?>";
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
              console.log(v)
              html+=`<tr>
                        <td>${j++}</td>
                        <td>${v.tag}</td>
                        
                        <td>
                          <button class="btn btn-primary btn-sm d-inline-block editTag " data-id="${v.id}"><i class="ni ni-settings"></i></button>
                          <button class="btn btn-danger btn-sm d-inline-block deleteTag " data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>    
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
    $('#createNewTag').click(function () {
        clearInterval(myStopTimer)
        $('#saveBtn').text("Save");
        $('#saveBtn').val("create-type");
        $('#tag_id').val('');
        $('#typeForm').trigger("reset");
        $('#modelHeading').html("Create New Type");
        $('#tagModal').modal('show');
    });   
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');   
        $.ajax({
          data: $('#typeForm').serialize(),
          url: "<?php echo e(route('admin.tag.store')); ?>",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#typeForm').trigger("reset");
              $('#tagModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getTags()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors= error.responseJSON.errors;
              if(errors){
                  var tag = errors.tag;
                  $('.error-message').text(tag)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
  $('tbody').on('click', '.editTag', function () {
      $('.alertMessage').addClass('d-none');
      var product_id = $(this).data('id');
      console.log(product_id);
      var url="<?php echo e(route('admin.tag.edit',':id')); ?>";
      url=url.replace(':id',product_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (data) {
            console.log(data);
              $('#modelHeading').html("Edit Type");
              $('#saveBtn').val("edit-user");
              $('#saveBtn').text("Update");
              $('#tagModal').modal('show');
              $('#tag_id').val(data.id);
              $('#tag').val(data.tag);
          },
          error: function (error) {
          }
        })
   })
   $('body').on('click', '.deleteTag', function () {
        clearInterval()
        var tag_id = $(this).data("id");
        console.log(tag_id);
        var status = confirm("Are You sure want to delete !");
        if (status) {
          var url="<?php echo e(route('admin.tag.destroy',':id')); ?>";
          url=url.replace(':id',tag_id);
          $.ajax({
              url: url,
              type: "DELETE",
              success: function (data) {
                $('.alertMessage').removeClass('d-none');
                $('.alertMessage').text(data.success);
                getTags()
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
<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/backend/tag/index.blade.php ENDPATH**/ ?>