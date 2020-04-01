<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <h4 class="m-0 font-weight-bold text-primary">Transportation List
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTransportationModal" id="createNewTransportation">
        <i class="fas fa-plus"></i> Add Transportation
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
                      <th>Transportation Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tableBody">
                  </tbody>
          </table>
        </div>
    </div>
  </div> <!-- /table end -->
  <div class="modal fade" id="transportationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
	      <form id="transportationForm" name="transportationForm" method="POST" enctype="multipart/form-data">
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
                  <label for="transportation_type" class="col-md-4 col-form-label text-md-right">Transportation Type</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control <?php $__errorArgs = ['transportation_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="transportation_type" name="transportation_type" autofocus required>
                      <p class="error-message-type p-2 text-md-left text-danger"></p>
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

  <div class="modal fade" id="editTransportationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <form id="editTransportationForm" name="editTransportationForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="edit_transportation_id" id="edit_transportation_id">
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
                  <label for="edit_transportation_type" class="col-md-4 col-form-label text-md-right">Transportation Type</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control <?php $__errorArgs = ['edit_transportation_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="edit_transportation_type" name="edit_transportation_type" autofocus required>
                      <p class="edit-error-message-type p-2 text-md-left text-danger"></p>
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

    
    getTransportation()
    var myStopTimer = setInterval(Timer,3000)

		$.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  	})
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }

    function getTransportation(){
      var url="<?php echo e(route('admin.get_transportation')); ?>";
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
                        <td>${v.transportation_type}</td>
                        <td>
                          <button class="btn btn-primary btn-sm d-inline-block editTransportation " data-id="${v.id}"><i class="fas fa-edit text-white"></i></button>
                          <button class="btn btn-danger btn-sm d-inline-block deleteTransportation " data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>    
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

    $('#createNewTransportation').click(function () {
        clearInterval(myStopTimer)
        $('#saveBtn').text("Save");
        $('#transportation_id').val('');
        document.getElementById("transportationForm").reset()
        $('#modelHeading').html("Create New Transportation");
        $('#transportationModal').modal('show');
    });   
    $('#transportationForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        $.ajax({
          data: formData,
          url: "<?php echo e(route('admin.transportation.store')); ?>",
          type: "POST",
          dataType: 'json',
          cache:false,
          contentType: false,
          processData: false,
          success: function (data) {
              $('#transportaionForm').trigger("reset");
              $('#transportationModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getTransportation()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var transportation_type=errors.transportation_type;
                  $('.error-message-type').text(transportation_type)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
  $('tbody').on('click', '.editTransportation', function () {
      $('.alertMessage').addClass('d-none');
      var transportation_id = $(this).data('id');
      var url="<?php echo e(route('admin.transportation.edit',':id')); ?>";
      url=url.replace(':id',transportation_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (data) {
              $('#edit_modelHeading').html("Edit Transportation");
              $('#editSaveBtn').text("Update");
              $('#editTransportationModal').modal('show');
              $('#edit_transportation_id').val(data.id);
              $('#edit_transportation_type').val(data.transportation_type);
          },
          error: function (error) {
          }
        })
   })
  $('#editTransportationForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        var id=$('input[name="edit_transportation_id"]').val();
        console.log(id);
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        formData.append('_method', 'PUT');
        console.log(name);
        var url="<?php echo e(route('admin.transportation.update',':id')); ?>";
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
              $('#editTransportaionForm').trigger("reset");
              $('#editTransportationModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getTransportation()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var transportation_type=errors.edit_transportation_type;
                  $('.edit-error-message-type').text(transportation_type)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
   $('body').on('click', '.deleteTransportation', function () {
        clearInterval()
        var transportation_id = $(this).data("id");
        var status = confirm("Are You sure want to delete !");
        if (status) {
          var url="<?php echo e(route('admin.transportation.destroy',':id')); ?>";
          url=url.replace(':id',transportation_id);
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
                getTransportation()
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
<?php echo $__env->make('backend.backend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/backend/transportation/index.blade.php ENDPATH**/ ?>