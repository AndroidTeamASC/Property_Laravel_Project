@extends('backend.backend_template')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header border-0">
        <h4 class="m-0 font-weight-bold text-primary">Feature List
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addTypeModal" id="createNewFeature">
        <i class="fas fa-plus"></i> Add Feature
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



  <div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
	      <form id="typeForm" name="typeForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="feature_id" id="feature_id">
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
                <label for="type">Feature</label>
                <input type="text" class="form-control @error('feature') is-invalid @enderror" id="feature" name="feature" autofocus required>
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

  <div class="modal fade" id="edidFeatureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <form method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
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
                  <input type="text" class="form-control @error('type') is-invalid @enderror editType" id="editType" name="type" autofocus required>
                  @error('type')
                  <span class="invalid-feedback" role="alert">
                      <strong class="error-message"></strong>
                  </span>
                  @enderror
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
@endsection


@section('script')
<script type="text/javascript">
	$(document).ready(function(){
    getFeatures()
    var myStopTimer = setInterval(Timer,3000)
		$.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  	});
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }
    function getFeatures(){
      var url="{{route('admin.get_feature')}}";
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
                        <td>${v.feature}</td>
                        
                        <td>
                          <button class="btn btn-primary btn-sm d-inline-block editFeature " data-id="${v.id}"><i class="ni ni-settings"></i></button>
                          <button class="btn btn-danger btn-sm d-inline-block deleteFeature " data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>    
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
    $('#createNewFeature').click(function () {
        clearInterval(myStopTimer)
        $('#saveBtn').text("Save");
        $('#saveBtn').val("create-type");
        $('#Feature_id').val('');
        $('#typeForm').trigger("reset");
        $('#modelHeading').html("Create New Type");
        $('#featureModal').modal('show');
    });   
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');   
        $.ajax({
          data: $('#typeForm').serialize(),
          url: "{{ route('admin.feature.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#typeForm').trigger("reset");
              $('#featureModal').modal('hide');
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getFeatures()
              setInterval(Timer, 3000);
          },
          error: function (error) {
            $('#saveBtn').html('Save Changes');
            var errors= error.responseJSON.errors;
              if(errors){
                  var feature = errors.feature;
                  $('.error-message').text(feature)
              }
            $('#saveBtn').html('Save Changes');
          }
      })
    })
  $('tbody').on('click', '.editFeature', function () {
      $('.alertMessage').addClass('d-none');
      var product_id = $(this).data('id');
      console.log(product_id);
      var url="{{route('admin.feature.edit',':id')}}";
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
              $('#featureModal').modal('show');
              $('#feature_id').val(data.id);
              $('#feature').val(data.feature);
          },
          error: function (error) {
          }
        })
   })
   $('body').on('click', '.deleteFeature', function () {
        clearInterval()
        var feature_id = $(this).data("id");
        console.log(feature_id);
        var status = confirm("Are You sure want to delete !");
        if (status) {
          var url="{{route('admin.feature.destroy',':id')}}";
          url=url.replace(':id',feature_id);
          $.ajax({
              url: url,
              type: "DELETE",
              success: function (data) {
                $('.alertMessage').removeClass('d-none');
                $('.alertMessage').text(data.success);
                getFeatures()
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