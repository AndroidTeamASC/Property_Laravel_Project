@extends('backend.backend_template')
@section('content')
<div class="row">
  <div class="col-xl-8">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Edit profile </h3>
          </div>
          <div class="alert alert-primary alertMessage d-none col-4 ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="col-4 text-right float-right">
            <a href="{{route('agent.property.edit', $property->id)}}" class="btn btn-sm btn-primary">Edit Property</a>
          </div>
        </div>
      </div>
      <div class="card-body">
          <h6 class="heading-small text-muted mb-4">Basic information</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Property Title
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->title}}
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Status
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->status->status}}
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Type
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->type->type}}
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Bedroom
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->bedroom}} rooms
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Bathroom
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->bathroom}} rooms
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Garage
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->garage}} garage
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Build Year
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->build_year}}
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Land Area
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->land_area}} sqft
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Building Area
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->building_area}} sqft
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Price
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                $ {{$property->price}}
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Descrption
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->description}}
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 h4 font-weight-300">
                Keyword
              </div>
              <div class="col-lg-6 h4 font-weight-300">
                {{$property->keyword}}
              </div>
            </div>
          </div>
          <hr class="my-4" />
          <!-- Address -->
          <h6 class="heading-small text-muted mb-4">Neighborhoods</h6>
          <div class="pl-lg-4">
            @if($property->neighborhoods != "null")
              @php
                $custom_neighborhoods = json_decode($property->neighborhoods)
              @endphp
              @foreach($custom_neighborhoods as $neighborhood)
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 h4 font-weight-300">
                  {{$neighborhood->place}}
                </div>
                @foreach($transportations as $transportation)
                  @if($neighborhood->transportation_id == $transportation->id)
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 h4 font-weight-300">
                      @php echo $transportation->transportation_type; @endphp
                  </div>
                  @endif
                @endforeach
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 h4 font-weight-300">
                  {{$neighborhood->duration}} min
                </div>
              </div>
              @endforeach 
            @endif
          </div>
          <hr class="my-4" />

          <h6 class="heading-small text-muted mb-4">Schools</h6>
          <div class="pl-lg-4">
            @if($property->schools != "null")
              @php
                $schools = json_decode($property->schools)
              @endphp
              @foreach($schools as $school)
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 h4 font-weight-300">
                  {{$school->school_name}}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 h4 font-weight-300">
                  Grade {{$school->grade}}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 h4 font-weight-300">
                  Rating : {{$school->rating}}
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 h4 font-weight-300">
                  {{$school->distance}} m
                </div>
              </div>
              @endforeach 
            @endif
          </div>

          <hr class="my-4" />
          <h6 class="heading-small text-muted mb-4">Facts</h6>
          <div class="pl-lg-4">
            <div class="row">
            @if($property->facts != "null")
              @php
                $facts = json_decode($property->facts)
              @endphp
              @foreach($facts as $fact)
              
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 h4 font-weight-300">
                  {{$fact->fact}}
                </div>
              @endforeach 
            @endif
            </div>
          </div>
          <hr class="my-4" />
          <!-- Description -->
          <h6 class="heading-small text-muted mb-4">Property's Video</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-12">
                @if($property->embed_code != null)
                  @php
                    echo "$property->embed_code";
                  @endphp
                @endif
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4">
   <div class="row">
      <div class="card card-profile col-12">
        <div class="card-body pt-0">
          <div class="text-center">
            <div class="h3 font-weight-400 mt-3">
              <i class="ni location_pin mr-2"></i>Featured
            </div>
          </div>
        </div>
        <div class="row">
          @if($property->feature_id != "null")
            @php
              $custom_features = json_decode($property->feature_id)
            @endphp
            @foreach($features as $feature)
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <ul class="amenities">
                  
                  @if(in_array($feature->id, $custom_features))
                  <li class="h4 font-weight-300">
                      @php echo $feature->feature; @endphp
                  </li>
                  @endif
                </ul>
              </div>
            @endforeach 
          @endif
        </div>
      </div>
   </div>
   <div class="row mt-3">
      <div class="card card-profile col-12">
        <div class="card-body pt-0">
          <div class="text-center">
            <div class="h3 font-weight-400 mt-3">
              <i class="ni location_pin mr-2"></i>Tags
            </div>
          </div>
        </div>
        <div class="row">
          @if($property->tag_id != "null")
            @php
              $custom_tags = json_decode($property->tag_id)
            @endphp
            @foreach($tags as $tag)
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <ul class="amenities"> 
                  @if(in_array($tag->id, $custom_tags))
                  <li class="h4 font-weight-300">
                      @php echo $tag->tag; @endphp
                  </li>
                  @endif
                </ul>
              </div>
            @endforeach 
          @endif
        </div>
      </div>
   </div> 
   <div class="row mt-3">
    <div class="card card-profile col-12">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($property->galleries as $gallery)
             @php
               $galleries = json_decode($gallery->gallery_image);
             @endphp
             @endforeach
             @php $i=0;
             @endphp
             @foreach($galleries as $gallery)
             <div class="carousel-item{{$i}}">
              <img src="{{asset($gallery)}}" class="d-block w-100" alt="..." style="height: 150px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Galleries</h5>
              </div>
             </div>
             @php $i++; @endphp
             @endforeach     
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="card-body pt-0">
        <div class="text-center">
          <div class="h3 font-weight-400 mt-3">
            <i class="ni location_pin mr-2"></i>Gallery Image of Property
          </div>
        </div>
      </div>
    </div>
   </div>
   <div class="row mt-3">
    <div class="card card-profile col-12">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          @php
            if(count($property->floors) >0){
          @endphp 
          @foreach($property->floors as $floor)
           @php
             $floors = json_decode($floor->floor_image);
             var_dump($property->floors);die();
           @endphp
          @endforeach
          @if($floors != "null")
           @foreach($floors as $floor)
             <div class="carousel-item{{$i}}">
              <img src="{{asset($floor)}}" class="d-block w-100" alt="..." style="height: 150px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Floor</h5>
              </div>
             </div>
           @endforeach
          @endif
         @php
         }
         @endphp     
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="card-body pt-0">
        <div class="text-center">
          <div class="h3 font-weight-400 mt-3">
            <i class="ni location_pin mr-2"></i>Floor Image of Property
          </div>
        </div>
      </div>
    </div>
   </div>
   <div class="row mt-3">
     <div class="card card-profile col-12">
      <div class="row">
        @php
          if(count($property->attachments) >0){
        @endphp
        @foreach($property->attachments as $attachment)
         @php
           $attachments = json_decode($attachment->file);
         @endphp
         @endforeach
         @php $i=0;
         @endphp
         @foreach($attachments as $attachment)
         <div class="carousel-item{{$i}} col-6 mt-3">
          <a href="{{asset($attachment)}}" download="download" class="btn btn-primary">Download File</a>
         </div>
         @php $i++; @endphp
         @endforeach
        @php
          }
        @endphp
      </div>
      <div class="card-body pt-0">
        <div class="text-center">
          <div class="h3 font-weight-400 mt-3">
            <i class="ni location_pin mr-2"></i>Attachment Files
          </div>
        </div>
      </div>       
     </div>
   </div>
   
  </div>
</div>
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $(".carousel-item0").addClass('active')
        });
  </script>
@endsection