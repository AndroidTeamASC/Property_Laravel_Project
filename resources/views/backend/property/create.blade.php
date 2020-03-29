@extends('backend.backend_template')
@section('content')
	
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3>Create Property <a href="{{route('agent.property.index')}}" class="float-right"><i class="fas fa-backward"></i> back</a></h3>
      </div>
      <div class="alert alert-primary alertMessage d-none float-left col-md-4 col-sm-2 offset-4">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('agent.property.store')}}" enctype="multipart/form-data" id="saveButton">
          @csrf
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <!-- Basic Detail -->
              <div class="card">
                <div class="card-header property-card">
                  Basic detail
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p class="error-message-title p-2 text-md-left text-danger"></p>
                  </div>
                             
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="status">Property Status</label><br>
                        <select name="status"  id="status" class="form-control">
                          @foreach($statuses as $status)
                              <option value="{{$status->id}}">{{$status->status}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-6">
                        <label for="type">Property Type</label><br>
                        <select name="type"  id="type" class="form-control">
                          @foreach($types as $type)
                              <option value="{{$type->id}}">{{$type->type}}</option>
                          @endforeach
                        </select>
                      </div>  
                    </div>        
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="bedroom">Bedroom</label>
                        <input type="number" class="form-control @error('bedroom') is-invalid @enderror" id="bedroom" name="bedroom" autofocus>

                        @error('bedroom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p class="error-message-bedroom p-2 text-md-left text-danger"></p>
                      </div>
                      <div class="col-6">
                        <label for="bathroom">Bathroom</label>
                        <input type="number" class="form-control @error('bathroom') is-invalid @enderror" id="bathroom" name="bathroom" autofocus>

                        @error('bathroom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p class="error-message-bathroom p-2 text-md-left text-danger"></p>
                      </div>  
                    </div>        
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="garage">Garages</label>
                        <input type="number" class="form-control @error('garage') is-invalid @enderror" id="garage" name="garage" autofocus>

                        @error('garage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="col-6">
                        <label for="build_year">Build Year</label>
                        <input type="number" class="form-control @error('build_year') is-invalid @enderror" id="build_year" name="build_year" autofocus>

                        @error('build_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>  
                    </div>        
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="land_area">Land Area</label>
                        <input type="text" class="form-control @error('land_area') is-invalid @enderror" id="land_area" name="land_area" autofocus>

                        @error('land_area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p class="error-message-land-area p-2 text-md-left text-danger"></p>
                      </div>
                      <div class="col-6">
                        <label for="building_area">Building Area</label>
                        <input type="text" class="form-control @error('building_area') is-invalid @enderror" id="building_area" name="building_area" autofocus>

                        @error('building_area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <p class="error-message-building-area p-2 text-md-left text-danger"></p>
                      </div>  
                    </div>        
                  </div>

                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="text-area @error('description') is-invalid @enderror" id="description" name="description" autofocus rows="7">
                    </textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="keyword">Keyword</label>
                    <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" autofocus placeholder="CSV Format">

                    @error('keyword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div> 
            
              <!-- Price -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Price
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8 col-8">
                      <div class="form-group">
                        <label class="sr-only" for="price">Price</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">฿</div>
                          </div>
                          <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price" name="price">
                          @error('price')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          
                        </div>
                      </div>
                    </div>
                    <p class="error-message-price p-2 text-md-left text-danger ml-3"></p>
                    <div class="col-auto mt-2">
                      <a href="#" class="call-us text-primary d-none">Call Us</a>
                      <input type="hidden" name="keep_price" class="call-us" id="keep_price">
                    </div>
                  </div>
                  <div class="col-auto my-1">
                    <div class="custom-control custom-checkbox mr-sm-2">
                      <input type="checkbox" class="custom-control-input" id="keepPrice">
                      <label class="custom-control-label" for="keepPrice">Keep Price Confidential</label>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Feature -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Feature
                </div>
                <div class="card-body">
                  <div class="row">
                    @foreach($features as $feature)
                    <div class="col-md-4 col-sm-6 my-1">
                      <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="{{$feature->feature}}" name="feature[]" multiple="multiple" value="{{$feature->id}}">
                        <label class="custom-control-label" for="{{$feature->feature}}">{{$feature->feature}}</label>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              
              <!-- Tag -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Tags
                </div>
                <div class="card-body">
                  <div class="row">
                    @foreach($tags as $tag)
                    <div class="col-md-6 col-sm-12 my-1">
                      <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="{{$tag->tag}}" name="tag[]" multiple="multiple" value="{{$tag->id}}">
                        <label class="custom-control-label" for="{{$tag->tag}}">{{$tag->tag}}</label>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>      
            </div>

            
            <div class="col-md-6 col-sm-12">
              <!-- Location -->
              <div class="card">
                <div class="card-header property-card">
                  Location
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" autofocus>

                      @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <p class="error-message-address p-2 text-md-left text-danger"></p>
                    </div>
                               
                    <div class="form-group">
                      <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3851939.0559790777!2d94.47181513781126!3d19.470253532422557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305652a7714e2907%3A0xba7b0ee41c622b11!2sMyanmar%20(Burma)!5e0!3m2!1sen!2smm!4v1584077219243!5m2!1sen!2smm" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="geocoder mb-3">
                            <div id="geocoder">
                          
                            </div>
                          </div>
                          <div id="map">
                            
                          </div>
                        </div>
                        
                      </div>
                    

                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="lng">Longitude</label>
                          <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="lng" name="longitude" autofocus>

                          @error('longitude')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          <p class="error-message-longitude p-2 text-md-left text-danger"></p>
                        </div>
                        <div class="col-6">
                          <label for="lat">Latitude</label>
                          <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="lat" name="latitude" autofocus>

                          @error('latitude')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          <p class="error-message-latitude p-2 text-md-left text-danger"></p>
                        </div>  
                      </div>        
                    </div>
                </div>
              </div> 
              
              <!-- Embed Code -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Video
                </div>
                <div class="card-body m-0">
                  <div class="form-group">
                    <label for="embed_code">Embed Code</label>
                    <input type="text" class="form-control @error('embed_code') is-invalid @enderror" id="embed_code" name="embed_code" autofocus>

                    @error('embed_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Floor Plan -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Floor Plan
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <input type="file" class="form-control" id="inlineFormInputGroup" placeholder="" name="floor[]" multiple="multiple">
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Attachments -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Attachments
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group mb-2">
                      <input type="file" class="form-control" id="inlineFormInputGroup" placeholder="" name="attachment[]" multiple="multiple">
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Gallery -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Gallery
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <div class="col-md-8 ofsset-2 input-group mb-2">
                      <input type="file" class="form-control" id="inlineFormInputGroup" placeholder="" name="gallery[]" multiple="multiple">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Neighborhood -->
            <div class="col-12">
              <!-- Neighborhood -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Neighborhoods
                </div>
                <div class="card-body m-0 ">
                  <p class="added-neighborhood p-2 text-md-left text-danger"></p>
                  <div class="row container-neighborhood">
                    <div class="col-3">
                      <div class="form-group">
                        <label for="place">Place</label>
                        <input type="text" class="form-control @error('place') is-invalid @enderror place" id="place" name="place" autofocus>

                        @error('place')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="min">Min</label>
                        <input type="text" class="form-control @error('min') is-invalid @enderror min" id="min" name="min" autofocus>
                        @error('min')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label for="transportation_type" class="d-block">Transportation</label>
                        <div class="row">
                          @foreach($transportations as $transportation)
                            <div class="col-md-3 col-3 neighborhood-type">
                              @if($transportation->transportation_type == 'Bicycle')
                              <input type="hidden" name="transportation_type" value="{{$transportation->id}}" data-type="{{$transportation->transportation_type}}" class="bicycle">
                              <button type="button" class="btn btn-primary btn-sm d-inline-block float-right bicycle"><i class="fas fa-bicycle"></i></button>
                              @elseif($transportation->transportation_type == 'Train')
                              <input type="hidden" name="transportation_type" value="{{$transportation->id}}" data-type="{{$transportation->transportation_type}}" class="train">
                              <button type="button" class="btn btn-primary btn-sm d-inline-block  float-right transportation_type train"><i class="fas fa-train"></i></button>
                              @elseif($transportation->transportation_type == 'Car')
                              <input type="hidden" name="transportation_type" value="{{$transportation->id}}" data-type="{{$transportation->transportation_type}}" class="car">
                              <button type="button" class="btn btn-primary btn-sm d-inline-block float-right transportation_type car"><i class="fas fa-car"></i></button>
                              @elseif($transportation->transportation_type == 'Walking')
                              <input type="hidden" name="transportation_type" value="{{$transportation->id}}" data-type="{{$transportation->transportation_type}}" class="walking">
                              <button type="button" class="btn btn-primary btn-sm d-inline-block float-right transportation_type walking"><i class="fas fa-walking"></i></button>
                              @endif
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="col-1" style="margin-top: 41px">
                      <button type="button" class="btn btn-primary btn-sm d-inline-block remove-neighborhood float-right"><i class="fas fa-times-circle"></i></button>
                    </div>
                  </div>
                  <p class="append-neighborhood d-inline d-none"></p>
                  <div class="row">
                   <div class="col-1 offset-11">
                     <button type="button" class="btn btn-primary btn-sm d-inline-block add-neighborhood float-right"><i class="fas fa-plus-circle"></i></button>
                   </div>
                  </div>
                  <div class="table-responsive mt-3" id="showNeighborhoodTable">
                    <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                            <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>Place</th>
                                <th>Duration</th>
                                <th>Transportation</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="showNeighborhoodTbody">
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
              <!-- School -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Schools
                </div>
                <div class="card-body m-0">
                  <p class="added-school p-2 text-md-left text-danger"></p>
                  <div class="row container-school">
                    <div class="col-3">
                      <div class="form-group">
                        <input type="number" class="form-control @error('rating') is-invalid @enderror rating" id="rating" name="rating" autofocus placeholder="Rating">

                        @error('rating')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror name" id="name" name="name" autofocus placeholder="Name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <input type="text" class="form-control @error('grade') is-invalid @enderror grade" id="grade" name="grade" autofocus placeholder="Grade">

                        @error('grade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <input type="text" class="form-control @error('distance') is-invalid @enderror distance" id="distance" name="distance" autofocus placeholder="distance">

                        @error('distance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-1" style="margin-top: 13px">
                      <button type="button" class="btn btn-primary btn-sm d-inline-block remove-school float-right"><i class="fas fa-times-circle"></i></button>
                    </div>
                  </div>
                  <p class="append-school d-inline d-none"></p>
                  <div class="row">
                    <div class="col-1 offset-11">
                     <button type="button" class="btn btn-primary btn-sm d-inline-block add-school float-right"><i class="fas fa-plus-circle"></i></button>
                   </div>
                  </div>
                  <div class="table-responsive mt-3" id="showSchoolTable">
                    <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                            <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Rating</th>
                                <th>Grade</th>
                                <th>Distance</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="showSchoolTbody">
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
              <!-- Facts -->
              <div class="card mt-2">
                <div class="card-header property-card">
                  Facts
                </div>
                <div class="card-body m-0">
                  <p class="added-fact p-2 text-md-left text-danger"></p>
                  <div class="row container-fact">
                    <div class="col-11">
                      <div class="form-group">
                        <label for="fact">Facts</label>
                        <input type="text" class="form-control @error('fact') is-invalid @enderror fact" id="fact" name="fact" autofocus>

                        @error('fact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-1" style="margin-top: 36px">
                      <button type="button" class="btn btn-primary btn-sm d-inline-block remove-fact float-right"><i class="fas fa-times-circle"></i></button>
                    </div>
                  </div>
                  <p class="append-fact d-inline d-none"></p>
                  <div class="row">
                   <div class="col-1 offset-11">
                     <button type="button" class="btn btn-primary btn-sm d-inline-block add-fact float-right"><i class="fas fa-plus-circle"></i></button>
                   </div>
                  </div>
                  <div class="table-responsive mt-3" id="showFactTable">
                    <table class="table table-bordered align-items-center table-white table-flush example" id="" width="100%" cellspacing="0">
                            <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>Fact</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="showFactTbody">
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" id="submitButton" class="btn btn-primary mt-2 float-right" value="submit">
        </form>
      </div>
    </div>
  </div>
</div>                    
@endsection

@section('script')

<script type="text/javascript">
  $(document).ready(function () {

    getMap();
   function getMap(){
  var url="{{route('agent.get_map')}}";
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {

            var saved_markers = data;
        console.log("Map=> "+saved_markers);
        var user_location = [100.541802,13.745575];
        mapboxgl.accessToken ='pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: user_location,
            zoom: 10
        });
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                alert("aaaaa");
                console.log(ev.result.center);

            });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat(marker)
                    .addTo(map);
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        $('#signupForm').submit(function(event){
            event.preventDefault();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

          }
          });
    }

    $('#showNeighborhoodTable').hide()
    $('#showSchoolTable').hide()
    $('#showFactTable').hide()
    $('.bicycle').addClass('current_type');

    /*Neighborhood*/
    /*Remove Neighborhood*/
    $('.card-body').on('click', '.remove-neighborhood', function (argument) {
      $('.container-neighborhood').hide()
    })

    /*Add Neighborhood and Call ShowNeighborhoodTable*/
    var neighborhoodListString='{"neighborhoodList":[]}';
    var neighborhoodListObj=JSON.parse(neighborhoodListString);
    $('.add-neighborhood').click(function (argument) {
      var neighborhood_item_array = []
      var place = $('.place').val()
      var min = $('.min').val()
      var transportation_id = $('.current_type').val()
      var transportation_type = $('.current_type').data('type')
      console.log(place,min,transportation_type)
      if (place && min && transportation_type) {
        var neighborhood={place:place,min:min,transportation_id:transportation_id,transportation_type:transportation_type};
        neighborhoodListObj.neighborhoodList.push(neighborhood);
        $('.container-neighborhood').show()
        $('.added-neighborhood').text("You added one neighborhoods")
        $('.place').val('')
        $('.min').val('')
        showNeighborhoodTable(neighborhoodListObj)
      }
      else {
        $('.container-neighborhood').show()
        $('.added-neighborhood').text("Invalid Place or Duration or Transportation Type")
      }
    })

    
    /*Show Neighborhood Function*/
    function showNeighborhoodTable(neighborhoodListObj) {
      var html = ''
        var j = 1
        console.log(neighborhoodListObj)
        var neighborhood_array=neighborhoodListObj.neighborhoodList;
        $.each(neighborhood_array,function (i,v) {
          html += `<tr>
                    <td>${j++}</td>
                    <td>${v.place}</td>
                    <td>${v.min}</td>
                    <td>${v.transportation_type}</td>
                    <td><button type="button" class="btn btn-sm delete-neighborhood" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                  </td></tr>`
        })
        $('#showNeighborhoodTbody').html(html)
      $('#showNeighborhoodTable').show()
    }

    /*Delete Neighborhood By Id*/
    $('#showNeighborhoodTbody').on('click','.delete-neighborhood',function (argument) {
      var neighborhood_id = $(this).data("id")
      console.log(neighborhood_id)
      neighborhoodListObj.neighborhoodList.splice(neighborhood_id, 1)
      showNeighborhoodTable(neighborhoodListObj)
    })

    /*School*/
    /*Remove School*/
    $('.card-body').on('click', '.remove-school', function (argument) {
      $('.container-school').hide()
    })

    /*Add School and Call ShowSchoolTable*/
    var schoolListString='{"schoolList":[]}';
    var schoolListObj=JSON.parse(schoolListString);
    $('.add-school').click(function (argument) {
      var rating = $('.rating').val()
      var name = $('.name').val()
      var grade = $('.grade').val()
      var distance = $('.distance').val()
      if (rating && name && grade && distance) {
        var school={rating:rating,name:name,grade:grade,distance:distance};
        schoolListObj.schoolList.push(school);
        $('.container-school').show()
        $('.added-school').text("You added one near school")
        $('.rating').val('')
        $('.name').val('')
        $('.grade').val('')
        $('.distance').val('')
        showSchoolTable(schoolListObj)
      }
      else {
        $('.container-school').show()
        $('.added-school').text("Invalid Rating or Name or Grade or Distance")
      }
    })

    /*Show School Function*/
    function showSchoolTable(schoolListObj) {
      var html = ''
      var j = 1
      var school_array=schoolListObj.schoolList;
      $.each(school_array,function (i,v) {
        html += `<tr>
                  <td>${j++}</td>
                  <td>${v.name}</td>
                  <td>${v.rating}</td>
                  <td>${v.grade}</td>
                  <td>${v.distance}</td>
                  <td><button type="button" class="btn btn-sm delete-school" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                </td></tr>`
      })
      $('#showSchoolTbody').html(html)
      $('#showSchoolTable').show()
    }

    /*Delete school By Id*/
    $('#showSchoolTbody').on('click','.delete-school',function (argument) {
      var school_id = $(this).data("id")
      schoolListObj.schoolList.splice(school_id, 1)
      showSchoolTable(schoolListObj)
    })

    /*Fact*/
    /*Remove Fact*/
    $('.card-body').on('click', '.remove-fact', function (argument) {
      $('.container-fact').hide()
    })

    /*Add Fact and Call ShowFactTable*/
    var factString='{"factList":[]}';
    var factListObj=JSON.parse(factString);
    $('.add-fact').click(function (argument) {
      var fact = $('.fact').val()
      if (fact) {
        var fact={fact:fact};
        factListObj.factList.push(fact);
        $('.container-fact').show()
        $('.fact').val('')
        $('.added-fact').text("You added one fact")
        showFactTable(factListObj)
      }
      else {
        $('.container-fact').show()
        $('.added-fact').text("Invalid Facts")
      }
    })

    /*Show Fact Function*/
    function showFactTable(fact_array) {
      var html = ''
        var j = 1
        var fact_array=factListObj.factList;
        $.each(fact_array,function (i,v) {
          html += `<tr>
                  <td>${j++}</td>
                  <td>${v.fact}</td>
                  <td><button type="button" class="btn btn-sm delete-fact" style="background-color: #5e72e4" data-id=${i}><i class="fas fa-trash text-white" ></i></button>
                  </td></tr>`
        })
        $('#showFactTbody').html(html)
      $('#showFactTable').show()
    }

    /*Delete Fact By Id*/
    $('#showFactTbody').on('click','.delete-fact',function (argument) {
      var fact_id = $(this).data("id")
      factListObj.factList.splice(fact_id, 1)
      showFactTable(factListObj)
    })

    $('.card-body').on('click', '.train', function (argument) {
      $('.train').removeClass('transportation_type');
      $('.bicycle').addClass('transportation_type');
      $('.car').addClass('transportation_type');
      $('.walking').addClass('transportation_type');
      $('.train').addClass('current_type');
      $('.bicycle').removeClass('current_type');
      $('.car').removeClass('current_type');
      $('.walking').removeClass('current_type');
    })
    $('.card-body').on('click', '.bicycle', function (argument) {
      $('.train').addClass('transportation_type');
      $('.bicycle').removeClass('transportation_type');
      $('.car').addClass('transportation_type');
      $('.walking').addClass('transportation_type');
      $('.bicycle').addClass('current_type');
      $('.train').removeClass('current_type');
      $('.car').removeClass('current_type');
      $('.walking').removeClass('current_type');
    })
    $('.card-body').on('click', '.car', function (argument) {
      $('.train').addClass('transportation_type');
      $('.bicycle').addClass('transportation_type');
      $('.car').removeClass('transportation_type');
      $('.walking').addClass('transportation_type');
      $('.car').addClass('current_type');
      $('.bicycle').removeClass('current_type');
      $('.train').removeClass('current_type');
      $('.walking').removeClass('current_type');
    })
    $('.card-body').on('click', '.walking', function (argument) {
      $('.train').addClass('transportation_type');
      $('.bicycle').addClass('transportation_type');
      $('.car').addClass('transportation_type');
      $('.walking').removeClass('transportation_type');
      $('.walking').addClass('current_type');
      $('.bicycle').removeClass('current_type');
      $('.car').removeClass('current_type');
      $('.train').removeClass('current_type');
    })

    $('#keepPrice').click(function (argument) {
      $('.call-us').removeClass('d-none');
      $('.call-us').val(0);
    })

    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    })

    /*Save Property*/
    $('#saveButton').submit(function (e) {
      e.preventDefault()
      var formData = new FormData(this)
      var price=$('#price').val();
      var keep_price = $('#keep_price').val()
      if (price == '' && keep_price == '') {
        $('.error-message-price').text("The price field is required")
        $('#price').addClass('border border-danger')
      }
      formData.append("neighborhood_array",JSON.stringify(neighborhoodListObj))
      formData.append("school_array",JSON.stringify(schoolListObj))
      formData.append("fact_array",JSON.stringify(factListObj))
      for (var pair of formData.entries())
        {
         console.log(pair[0]+ ', '+ pair[1]); 
        }
      $.ajax({
          data: formData,
          url: "{{ route('agent.property.store') }}",
          type: "POST",
          dataType:'json',
          cache:false,
          contentType: false,
          processData: false,
          success: function (data) {
            $('#saveButton').trigger("reset")
            $('.alertMessage').removeClass('d-none')
            $('.alertMessage').text(data.success)
            window.location.href="{{route('agent.property.index')}}"
          },
          error: function (error) {
            var errors=error.responseJSON.errors;
              if(errors){
                console.log(errors)
                  var title=errors.title;
                  var bedroom=errors.bedroom;
                  var bathroom=errors.bathroom;
                  var land_area=errors.land_area;
                  var building_area=errors.building_area;
                  var address=errors.address;
                  var longitude=errors.longitude;
                  var latitude=errors.latitude;
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
                  $('.error-message-address').text(address)
                  $('#address').addClass('border border-danger')
                  $('.error-message-longitude').text(longitude)
                  $('#lng').addClass('border border-danger')
                  $('.error-message-latitude').text(latitude)
                  $('#lat').addClass('border border-danger')
              }
          }
      })
    })

  })
</script>

@endsection