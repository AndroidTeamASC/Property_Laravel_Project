@extends('backend.backend_template')
@section('add')
  <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{asset(Auth::user()->image)}}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">{{Auth::user()->name}}</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="#!" class="btn btn-neutral">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
        
@endsection
@section('content')
<div class="row">
  <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="{{asset(Auth::user()->image)}}" alt="Image placeholder" class="card-img-top" style="height: 250px">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{asset(Auth::user()->image)}}" class="rounded-circle" style="height: 150px">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                    </div>
                    <div>
                    </div>
                    <div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  {{Auth::user()->name}}
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{Auth::user()->name}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{Auth::user()->email}}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>{{Auth::user()->phone_no}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-4">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                  <div class="alert alert-primary alertMessage d-none col-md-4 col-8">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form id="updateButton" method="POST">
                <input type="hidden" name="agent_id" id="agent_id" value="{{Auth::user()->id}}">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="{{Auth::user()->name}}" name="edit_name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" value="{{Auth::user()->email}}" name="edit_email">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input type="text" id="input-address" class="form-control" placeholder="Username" value="{{Auth::user()->address}}" name="edit_address">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone_no">Phone Number</label>
                        <input type="number" id="input-phone_no" class="form-control" value="{{Auth::user()->phone_no}}" name="edit_phone_no">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Change Profile & Password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-edit_image">New Profile</label>
                        <input type="hidden" name="agent_old_image" value="{{Auth::user()->image}}">
                        <input type="file" id="input-edit_image" class="form-control" placeholder="Username" name="edit_image">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-edit_password">New Password</label>
                        <input type="hidden" name="old_password" value="{{Auth::user()->password}}">
                        <input type="password" id="input-edit_password" class="form-control" placeholder="" name="edit_password">
                      </div>
                    </div>
                  </div>
                </div>
                <input type="submit" id="saveButton" class="btn btn-primary mt-2 float-right" value="Update">
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('script')
  <script type="text/javascript">
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    })
    var myStopTimer = setInterval(Timer,3000)
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }


    /*Save Property*/
    $('#updateButton').submit(function (e) {
      e.preventDefault()
      var formData = new FormData(this)
      var agent_id = $('#agent_id').val()
      for (var pair of formData.entries())
        {
         console.log(pair[0]+ ', '+ pair[1]); 
        }
        formData.append('_method', 'PUT');
        var url="{{ route('agent.update',':id') }}";
        url=url.replace(':id',agent_id);
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
            $('.alertMessage').text("Profile Updated Sucessfully")
            setInterval(Timer, 3000);
            window.location.href="{{route('agent.profile')}}"
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
  </script>
@endsection