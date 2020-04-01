<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <h4 class="m-0 font-weight-bold text-primary">Post List
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addPostModal" id="createNewPost">
        <i class="fas fa-plus"></i> Add Post
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
                      <th>Post Image</th>
                      <th>Title</th>
                      <th>Context</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tableBody">
                  </tbody>
          </table>
        </div>
    </div>
  </div> <!-- /table end -->
  <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
	      <form id="postForm" name="postForm" method="POST" enctype="multipart/form-data">
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
                  <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title" name="title" autofocus required>
                      <p class="error-message-title p-2 text-md-left text-danger"></p>
                  </div>
                </div>
              </div>
              <div class="col-12 my-2">
                <div class="form-group row">
                  <label for="context" class="col-md-4 col-form-label text-md-right">Context</label>
                  <div class="col-md-6">
                    <textarea type="text" class="text-area <?php $__errorArgs = ['context'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="context" name="context" autofocus rows="7">
                    </textarea>
                    <p class="error-message-context p-2 text-md-left text-danger"></p>
                  </div>
                </div>
              </div>
              <div class="col-12 my-2">
                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                  <div class="col-md-6">
                    <input type="file" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="image" name="image" autofocus required>
                      <p class="error-message-image p-2 text-md-left text-danger"></p>
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

  <div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <form id="editPostForm" name="editPostForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="edit_post_id" id="edit_post_id">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_modelHeading"></h5>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="col-12 my-2">
                <div class="form-group row">
                  <label for="edit_title" class="col-md-4 col-form-label text-md-right">Title</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control <?php $__errorArgs = ['edit_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="edit_title" name="edit_title" autofocus required>
                      <p class="error-message-edit_title p-2 text-md-left text-danger"></p>
                  </div>
                </div>
              </div>
              <div class="col-12 my-2">
                <div class="form-group row">
                  <label for="edit_context" class="col-md-4 col-form-label text-md-right">Context</label>
                  <div class="col-md-6">
                    <textarea type="text" class="text-area <?php $__errorArgs = ['edit_context'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="edit_context" name="edit_context" autofocus rows="7">
                    </textarea>
                    <p class="error-message-edit_context p-2 text-md-left text-danger"></p>
                  </div>
                </div>
              </div>
              <div class="col-12 my-2">
                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                  <div class="col-md-6">
                    <input type="file" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="image" name="image" autofocus>
                    <input type="hidden" name="old_image" id="old_image">
                      <img  class="old_image" style="height: 100px; width: 100px">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary save" name="button" id="editSaveBtn"><i class="fas fa-save"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	$(document).ready(function(){

    
    getPost()
    var myStopTimer = setInterval(Timer,3000)

		$.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  	})
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }

    function getPost(){
      var url="<?php echo e(route('admin.get_post')); ?>";
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {
            var j=1;
            var html='';
            $.each(data,function(i,v){
              console.log(data);
              html+=`<tr>
                        <td>${j++}</td>
                        <td><img src="<?php echo e(asset('${v.image}')); ?>" class="img-fluid" style="height: 100px; width:100px"/></td>
                        <td>${v.title}</td>
                        <td>${v.context}</td>
                        <td>
                          <button class="btn btn-primary btn-sm d-inline-block editPost " data-id="${v.id}"><i class="ni ni-settings"></i></button>
                          <button class="btn btn-danger btn-sm d-inline-block deletePost" data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>    
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

    $('#createNewPost').click(function () {
        clearInterval(myStopTimer)
        $('#saveBtn').text("Save");
        $('#transportation_id').val('');
        document.getElementById("postForm").reset()
        $('#modelHeading').html("Create New Post");
        $('#postModal').modal('show');
    });   
    $('#postForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        $.ajax({
          data: formData,
          url: "<?php echo e(route('admin.post.store')); ?>",
          type: "POST",
          dataType: 'json',
          cache:false,
          contentType: false,
          processData: false,
          success: function (data) {
              $('#postForm').trigger("reset");
              $('#postModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getPost();
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var title=errors.title;
                  var context=errors.context;
                  var image=errors.image;
                  $('.error-message-title').text(title)
                  $('.error-message-context').text(context)
                  $('.error-message-image').text(image)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
  $('tbody').on('click', '.editPost', function () {
      $('.alertMessage').addClass('d-none');
      var post_id = $(this).data('id');
      var url="<?php echo e(route('admin.post.edit',':id')); ?>";
      url=url.replace(':id',post_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (data) {
              $('#edit_modelHeading').html("Edit Post");
              $('#editSaveBtn').text("Update");
              $('#editPostModal').modal('show');
              $('#edit_post_id').val(data.id);
              $('#edit_title').val(data.title);
              $('#edit_context').val(data.context);
              $('#old_image').val(data.image);
              $('.old_image').attr('src',`<?php echo e(asset('${data.image}')); ?>`);
          },
          error: function (error) {
          }
        })
   })
  $('#editPostForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        var id=$('input[name="edit_post_id"]').val();
        console.log(id);
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        formData.append('_method', 'PUT');
        console.log(name);
        var url="<?php echo e(route('admin.post.update',':id')); ?>";
        url=url.replace(':id',id);
        $.ajax({
          data: formData,
          url: url,
          type: "POST",
          dataType: 'json',
          cache:false,
          contentType: false,
          processData: false,
          success: function (data) {
              $('#editPostForm').trigger("reset");
              $('#editPostModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getPost()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var title=errors.title;
                  var context=errors.context;
                  $('.edit-error-message-edit_title').text(title)
                  $('.edit-error-message-edit_cotnext').text(cotnext)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
   $('body').on('click', '.deletePost', function () {
        clearInterval()
        var post_id = $(this).data("id");
        var status = confirm("Are You sure want to delete !");
        if (status) {
          var url="<?php echo e(route('admin.post.destroy',':id')); ?>";
          url=url.replace(':id',post_id);
          $.ajax({
              url: url,
              type: "DELETE",
              success: function (data) {
                $('.alertMessage').removeClass('d-none');
                if (data.success) {
                  $('.alertMessage').text(data.success);
                }else{
                  $('.alertMessage').text(data.error);
                }
                getPost()
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
<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Property_Laravel_Project\resources\views/backend/post/index.blade.php ENDPATH**/ ?>