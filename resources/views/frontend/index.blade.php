@extends('frontend.frontend_template')
@section('banner')
    <div class="banner" id="banner">
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item banner-max-height active">
                    <img class="d-block w-100 h-75" src="{{asset('frontend_template/img/banner 3.jpg')}}" alt="banner">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="carousel-content container">
                            <div class="text-center">
                                <h3 class="text-uppercase">Find Your Dream House</h3>
                                <p class="none-mb-992-0">
                                        
                                </p>
                                <div class="inline-search-area none-992">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 search-col">
                                            <select class="selectpicker search-fields" name="property-status" id="status">
                                                <option>Status</option>
                                                @foreach($statuses as $status)
                                                <option value="{{$status->id}}">{{$status->status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 search-col middle-col-1">
                                            <select class="selectpicker search-fields" name="property-types" id="type">
                                                <option>Type</option>
                                                @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 search-col middle-col-1">
                                            <select class="selectpicker search-fields" name="Bedrooms" id="bedroom">
                                                <option>Bedrooms</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="above3">Above 03</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 search-col middle-col-2">
                                            <select class="selectpicker search-fields" name="Bathrooms" id="bathroom">
                                                <option>Bathrooms</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="above3">Above 03</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 search-col middle-col-2">
                                            <input type="text" name="name" class="form-control selectpicker" placeholder="Keyword..." style="font-size: 14px;font-weight: 300;" id="keyword">
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 search-col">
                                            <button class="btn button-theme btn-search btn-block" id="search">
                                                <i class="fa fa-search"></i><strong>Find</strong>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('search_properties')
<div class="our-team-2 content-area" id="search_properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Search Properties</h1>
        </div>
        <div class="row" id="search_properties_area">
            
        </div>
    </div>
</div>
@endsection

@section('featured_properties')
    <div class="featured-properties content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title mt2">
                <h1>Featured Properties</h1>
                <div class="list-inline-listing">
                    <ul class="filters filteriz-navigation clearfix">
                        <li class="active btn filtr-button filtr" data-filter="all">All</li>
                        @foreach($types as $type)
                        <li data-filter="{{$type->id}}" class="btn btn-inline filtr-button filtr">{{$type->type}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row filter-portfolio">
                <div class="cars">
                    @foreach($properties as $property)
                    <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="{{$property->type_id}}">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="{{route('property_detail',$property->id)}}" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price">
                                            ${{$property->price}}
                                        </p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="listing-time opening">{{$property->status->status}} </div>
                                    {{-- @php
                                        $gallery_images = json_decode($property->gallery->gallery_image);
                                        $gallery_image = $gallery_images[0];
                                    @endphp --}}
                                    <img class="d-block w-100 image" src="@foreach($property->galleries as $gallery)
                                       @php
                                         $galleries = json_decode($gallery->gallery_image);
                                       @endphp
                                       @endforeach
                                     {{  $galleries[0] }}" alt="properties" style="height: 350px">
                                     <h1 class="title overlay">
                                    <a href="{{route('property_detail',$property->id)}}" class="hover-text">{{$property->title}}</a>
                                </h1>
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="{{route('property_detail',$property->id)}}">{{$property->title}}</a>
                                </h1>
                                <div class="location">
                                    <a href="{{route('property_detail',$property->id)}}">
                                        <i class="fa fa-map-marker"></i>{{$property->location->address}}
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-square"></i> {{$property->building_area}} sq ft
                                    </li>
                                    <li>
                                        <i class="flaticon-furniture"></i> {{$property->bedroom}} Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i> {{$property->bathroom}} Baths
                                    </li>
                                    <li>
                                        <i class="flaticon-vehicle"></i> 
                                        @php
                                            $garage = $property->garage;
                                            if($garage == null){
                                                $garage = 0;
                                            }
                                            
                                        @endphp
                                        {{$garage}} Garage
                                    </li>
                                    <li>
                                        <i class="flaticon-window"></i> {{$property->build_year}}
                                    </li>
                                    <li>
                                        <i class="flaticon-monitor"></i> TV
                                    </li>
                                </ul>
                            </div>
                            <div class="footer clearfix">
                                {{-- <div class="pull-left days">
                                    <a><i class="fa fa-user icon"></i> {{$property->agent->name}}</a> 
                                </div>
                                --}}
                                <div class="pull-right">
                                    <a><i class="flaticon-time icon"></i> {{$property->created_at->diffForHumans()}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('services')
    <div class="services-3 content-area-5 bg-grea-3">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>What are you looking for?</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-info-2">
                        <div class="s-info">
                            <i class="flaticon-apartment"></i>
                            <span>Apartments</span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-info-2">
                        <div class="s-info">
                            <i class="flaticon-internet"></i>
                            <span>Houses</span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-info-2">
                        <div class="s-info">
                            <i class="flaticon-vehicle"></i>
                            <span>Garages</span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-info-2">
                        <div class="s-info">
                            <i class="flaticon-coins"></i>
                            <span>Commercial</span>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                    </div>
                </div>
            </div>
            <div class="text-center read-more-2">
                <a href="services-1.html" class="btn-white">Read More</a>
            </div>
        </div>
    </div>
@endsection

@section('recent_properties')
    <div class="recently-properties content-area-12">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Recently Properties</h1>
            </div>
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                    @foreach($recent_properties as $recent_property)
                    <div class="slick-slide-item">
                        <div class="property-box-5">
                            <div class="property-photo">
                                {{-- @php
                                    $gallery_images = json_decode($property->gallery->gallery_image);

                                    $gallery_image = $gallery_images[0];
                                @endphp --}}
                                <img class="img-fluid image" src="@foreach($recent_property->galleries as $gallery)
                                       @php
                                         $galleries = json_decode($gallery->gallery_image);
                                       @endphp
                                       @endforeach
                                     {{  $galleries[0] }}" alt="properties" style="height: 300px">
                                     
                                <div class="date-box">{{$recent_property->status->status}}</div>
                            </div>
                            <div class="detail">
                                <div class="heading">
                                    <h3>
                                        <a href="{{route('property_detail',$property->id)}}">{{$recent_property->title}}</a>
                                    </h3>
                                    <div class="location">
                                        <a href="{{route('property_detail',$property->id)}}">
                                            <i class="fa fa-map-marker"></i>{{$recent_property->location->address}}
                                        </a>
                                    </div>
                                </div>
                                <div class="properties-listing">
                                    <span>{{$recent_property->bedroom}} Beds</span>
                                    <span>{{$recent_property->bathroom}} Baths</span>
                                    <span>{{$recent_property->building_area}} sqft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="slick-btn">
                    <div class="slick-prev slick-arrow-buton-2"></div>
                    <div class="slick-next slick-arrow-buton-2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('counters')
    <div class="counters-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-box">
                        <div class="icon"><i class="flaticon-tag"></i></div>
                        <h1 class="counter">{{$listing_sale}}</h1>
                        <p>Listings For Sale</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-business"></i>
                        </div>
                        <h1 class="counter">{{$listing_rent}}</h1>
                        <p>Listings For Rent</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-people"></i>
                        </div>
                        <h1 class="counter">{{$agent}}</h1>
                        <p>Agents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('testimonial')
    <div class="testimonial-2 t2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="testimonial-inner">
                        <header class="testimonia-header">
                            <h1>Our Testimonial</h1>
                        </header>
                        <div id="carouselExampleIndicators4" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators4" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators4" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators4" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="lead">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.
                                    </p>
                                    <div class="media mb-4">
                                        <a class="pr-3" href="#">
                                            <img src="http://placehold.it/50x50" alt="use" class="img-fluid">
                                        </a>
                                        <div class="media-body align-self-center">
                                            <h5>
                                                <a href="#">Anne Brady</a>
                                            </h5>
                                            <h6>Creative Director</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <p class="lead">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.
                                    </p>
                                    <div class="media mb-4">
                                        <a class="pr-3" href="#">
                                            <img src="http://placehold.it/50x50" alt="use" class="img-fluid">
                                        </a>
                                        <div class="media-body align-self-center">
                                            <h5>
                                                <a href="#">Eliane Perei</a>
                                            </h5>
                                            <h6>Web Developer</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <p class="lead">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae.
                                    </p>
                                    <div class="media mb-4">
                                        <a class="pr-3" href="#">
                                            <img src="http://placehold.it/50x50" alt="use" class="img-fluid">
                                        </a>
                                        <div class="media-body align-self-center">
                                            <h5>
                                                <a href="#">Maria Blank</a>
                                            </h5>
                                            <h6>Office Manager</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('partners')
    <div class="partners">
        <div class="container">
            <h4>Brands and Partners</h4>
            <div class="slick-slider-area">
                <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                    <div class="slick-slide-item"><img src="http://placehold.it/160x80" alt="brand" class="img-fluid"></div>
                </div>
                <div class="slick-prev slick-arrow-buton">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="slick-next slick-arrow-buton">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function (argument) {
            jQuery("time.timeago").timeago();
            $('#search_properties').hide()
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              }
            })
            $('#search').click(function (argument) {
                var status = $('#status').val()
                var type = $('#type').val()
                var bedroom = $('#bedroom').val()
                var bathroom = $('#bathroom').val()
                var keyword = $('#keyword').val()
                console.log(status,type,bedroom,bathroom,keyword)
                var url="{{route('home_search')}}"
                $.ajax({
                  type:'POST',
                  url: url,
                  data: {'status':status, 'type':type, 'bedroom':bedroom, 'bathroom':bathroom, 'keyword':keyword},
                  success: (data) => {
                    var j=1;
                    var html='';
                    $.each(data,function(i,v){
                      console.log(data);
                      var gallery_images = JSON.parse(v.gallery_image);
                      var gallery_image = gallery_images[0];
                      var garage = v.garage;
                      if (garage == null) {
                        garage = 0;
                      }
                      var build_year = v.build_year;
                      if (build_year == null) {
                        build_year = '';
                      }
                      console.log(gallery_image)
                      var date = jQuery.timeago(v.created_at); 
                      html+=`<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        ${v.price}
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <div class="listing-time opening">${v.status}</div>
                                <img class="d-block w-100" src="{{asset('${gallery_image}')}}" style="height:350px">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">${v.title}</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>${v.address}
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-square"></i> ${v.building_area} sq ft
                                </li>
                                <li>
                                    <i class="flaticon-furniture"></i> ${v.bedroom} Beds
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i> ${v.bathroom} Baths
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i> ${garage} Garage
                                </li>
                                <li>
                                    <i class="flaticon-window"></i> ${build_year} 
                                </li>
                                <li>
                                    <i class="flaticon-monitor"></i> TV
                                </li>
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <a><i class="fa fa-user"></i> ${v.name}</a>
                            </div>
                            <div class="pull-right">
                                <a><i class="flaticon-time"></i> ${date}</a>
                            </div>
                        </div>
                    </div>
                        </div>`;
                    });
                    $('#search_properties_area').html(html);  
                    $('#search_properties').show()
                  },
                  error: function(error){
                    console.log(error)
                  }
              })
            }) 
        })
    </script>
@endsection