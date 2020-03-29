@extends('backend.backend_template')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <h4 class="m-0 font-weight-bold text-primary">Agent List
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTransportationModal" id="createNewAgent">
        <i class="fas fa-plus"></i> Add Agent
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
                      <th>Address</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tableBody">
                  </tbody>
          </table>
        </div>
    </div>
  </div> <!-- /table end -->
  <div class="modal fade" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
	      <form id="agentForm" name="agentForm" method="POST" enctype="multipart/form-data">
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
                  <input type="hidden" name="role" value="agent">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus required>
                      <p class="error-message-name p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                  <div class="col-md-6">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus required>
                      <p class="error-message-email p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="phone_no" class="col-md-4 col-form-label text-md-right">Phone No</label>
                  <div class="col-md-6">
                    <input type="number" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" autofocus required>
                      <p class="error-message-phone_no p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" autofocus required>
                      <p class="error-message-address p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="image" class="col-md-4 col-form-label text-md-right">{{ __(' Image') }}</label>

                  <div class="col-md-6">
                      <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>
                      <p class="error-message-image p-2 text-md-left text-danger"></p>
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control @error('name') is-invalid @enderror" id="password" name="password" autofocus required>
                      <p class="error-message-password p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autofocus required>
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

  <div class="modal fade" id="editAgentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <form id="editAgentForm" name="editAgentForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="edit_agent_id" id="edit_agent_id">
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
                  <input type="hidden" name="role" value="agent">
                  <label for="edit_name" class="col-md-4 col-form-label text-md-right">Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control @error('edit_name') is-invalid @enderror" id="edit_name" name="edit_name" autofocus required>
                      <p class="error-message-edit-name p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="edit_email" class="col-md-4 col-form-label text-md-right">Email</label>
                  <div class="col-md-6">
                    <input type="email" class="form-control @error('edit_email') is-invalid @enderror" id="edit_email" name="edit_email" autofocus required>
                      <p class="error-message-edit-email p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="edit_phone_no" class="col-md-4 col-form-label text-md-right">Phone No</label>
                  <div class="col-md-6">
                    <input type="number" class="form-control @error('edit_phone_no') is-invalid @enderror" id="edit_phone_no" name="edit_phone_no" autofocus required>
                      <p class="error-message-edit-phone_no p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="edit_address" class="col-md-4 col-form-label text-md-right">Address</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control @error('edit_address') is-invalid @enderror" id="edit_address" name="edit_address" autofocus required>
                      <p class="error-message-edit-address p-2 text-md-left text-danger"></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="edit_image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                  <div class="col-md-6">
                      <input type="hidden" name="agent_old_image" id="agent_old_image">
                      <input id="edit_image" type="file" class="form-control @error('edit_image') is-invalid @enderror" name="edit_image" value="{{ old('edit_image') }}" autocomplete="edit_image" autofocus>
                      <p class="edit-error-message-image p-2 text-md-left text-danger"></p>
                      <img class="agent_old_image img-fluid pt-2" style="width: 50px">
                  </div>
                </div> 
                <div class="form-group row">
                  <div class="col-16 offset-4">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="changePassword" type="checkbox">
                      <label class="custom-control-label" for="changePassword">
                        <span class="text-muted">Change Password</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row" id="edit_password_container">
                  <input type="hidden" name="old_password" id="old_password">
                  <label for="edit_password" class="col-md-4 col-form-label text-md-right">New assword</label>
                  <div class="col-md-6">
                    <input type="edit_password" class="form-control @error('edit_password') is-invalid @enderror" name="edit_password" id="edit_password">
                      <p class="error-message-edit-password p-2 text-md-left text-danger"></p>
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
@endsection


@section('script')
<script type="text/javascript">
	$(document).ready(function(){    
    getAgent()
    var myStopTimer = setInterval(Timer,3000)
    $('#edit_password_container').hide();
		$.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  	})
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }

    function getAgent(){
      var url="{{route('admin.get_agent')}}";
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {
            var j=1;
            var html='';
            $.each(data,function(i,v){
              html+=`<tr>
                        <td>${j++}</td>
                        <td>${v.name}</td>
                        <td>${v.address}</td>
                        <td><img src="{{asset('${v.image}')}}" class="img-fluid" style="width:50px;height:50px" alt="No Profile Picture"></td>
                        <td>
                          <button class="btn btn-primary btn-sm d-inline-block editAgent" data-id="${v.id}"><i class="ni ni-settings"></i></button>
                          <button class="btn btn-danger btn-sm d-inline-block deleteAgent" data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>    
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

    $('#createNewAgent').click(function () {
        clearInterval(myStopTimer)
        $('#saveBtn').text("Save");
        /*$('#transportation_id').val('');
        $('.transportation_old_image').removeAttr('src');*/
        document.getElementById("agentForm").reset()
        $('#modelHeading').html("Create New Agent");
        $('#agentModal').modal('show');
    });   
    $('#agentForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        $.ajax({
          data: formData,
          url: "{{ route('admin.agent.store') }}",
          type: "POST",
          dataType: 'json',
          cache:false,
          contentType: false,
          processData: false,
          success: function (data) {
              $('#transportaionForm').trigger("reset");
              $('#agentModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getAgent()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var name=errors.name;
                  var email=errors.email;
                  var password=errors.password;
                  var phone_no=errors.phone_no;
                  var address=errors.address;
                  $('.error-message-name').text(name)
                  $('.error-message-email').text(email)
                  $('.error-message-password').text(password)
                  $('.error-message-phone_no').text(phone_no)
                  $('.error-message-address').text(address)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
  $('tbody').on('click', '.editAgent', function () {
      $('.alertMessage').addClass('d-none');
      var agent_id = $(this).data('id');
      var url="{{route('admin.agent.edit',':id')}}";
      url=url.replace(':id',agent_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (response) {
            var data = response.agent
              $('#edit_modelHeading').html("Edit Agent");
              $('#editSaveBtn').text("Update");
              $('#editAgentModal').modal('show');
              $('#edit_agent_id').val(data.id);
              $('#edit_name').val(data.name);
              $('#edit_email').val(data.email);
              $('#edit_phone_no').val(data.phone_no);
              $('#edit_address').val(data.address);
              $('#old_password').val(response.password);
              $('#edit_password').val('');
              console.log(data.image)
              $('#agent_old_image').val(data.image);
              $('.agent_old_image').attr('src',`{{asset('${data.image}')}}`);
          },
          error: function (error) {
          }
        })
   })
  $('#changePassword').click(function () {
        $('#edit_password_container').show();
    }); 
  $('#editAgentForm').submit(function (e) {
        e.preventDefault();
        /*$(this).html('Sending..'); */
        var formData = new FormData(this)
        var id=$('input[name="edit_agent_id"]').val();
        console.log(id);
        for (var pair of formData.entries())
          {
           console.log(pair[0]+ ', '+ pair[1]); 
          }
        formData.append('_method', 'PUT');
        console.log(name);
        var url="{{ route('admin.agent.update',':id') }}";
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
              $('#editAgentForm').trigger("reset");
              $('#editAgentModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getAgent()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors=error.responseJSON.errors;
              if(errors){
                  var name=errors.name;
                  var email=errors.email;
                  var password=errors.password;
                  var phone_no=errors.phone_no;
                  var address=errors.address;
                  $('.error-message-name').text(name)
                  $('.error-message-email').text(email)
                  $('.error-message-password').text(password)
                  $('.error-message-phone_no').text(phone_no)
                  $('.error-message-address').text(address)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
   $('body').on('click', '.deleteAgent', function () {
        clearInterval()
        var agent_id = $(this).data("id");
        var status = confirm("Are You sure want to delete !");
        if (status) {
          var url="{{route('admin.agent.destroy',':id')}}";
          url=url.replace(':id',agent_id);
          $.ajax({
              url: url,
              type: "DELETE",
              success: function (data) {
                $('.alertMessage').removeClass('d-none');
                $('.alertMessage').text(data.success);
                getAgent()
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
@endsection