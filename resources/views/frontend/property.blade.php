@extends('frontend/property_template')
@section('property')


    <div class="col-lg-8 col-md-12" id="property">
                <!-- Option bar start -->
             <!--    <div class="option-bar">
                    <div class="float-left">
                        <h4>
                            <span class="heading-icon">
                                <i class="fa fa-th-large"></i>
                            </span>
                            <span class="title-name">Properties Grid</span>
                        </h4>
                    </div>
                    <div class="float-right cod-pad">
                        <div class="sorting-options">
                            <select class="sorting">
                                <option>New To Old</option>
                                <option>Old To New</option>
                                <option>Properties (High To Low)</option>
                                <option>Properties (Low To High)</option>
                            </select>
                            <a href="properties-list-rightside.html" class="change-view-btn"><i class="fa fa-th-list"></i></a>
                            <a href="properties-grid-rightside.html" class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
                        </div>
                    </div>
                </div> -->
                <!-- Property section start -->
                <div class="row property-section ">
                   @foreach($properties as $property)
                    <div class="col-lg-6 col-md-6 col-sm-12 filtr-item" >
                      
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="{{route('property_detail',$property->id)}}" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-ratings-box">
                                        <p class="price">
                                            {{$property->price}}
                                        </p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="listing-time opening">{{$property->status->status}}</div>
                                    <img class="d-block w-100" src="@foreach($property->galleries as $gallery)
                                       @php
                                         $galleries = json_decode($gallery->gallery_image);
                                       @endphp
                                       @endforeach
                                     {{  asset($galleries[0]) }}" alt="properties" style="height: 350px">
                                     <h1 class="title overlay">
                                        <a href="{{route('property_detail',$property->id)}}" class="hover-text">{{$property->title}}</a>
                                    </h1>
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="{{route('property_detail',$property->id)}}"> 
                                       {{$property->title}}
                                    </a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="fa fa-map-marker"></i>{{$property->location->address}}
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-square"></i> {{$property->landarea}}
                                    </li>
                                    <li>
                                        <i class="flaticon-furniture"></i> {{$property->bedroom}}
                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i> {{$property->bathroom}}
                                    </li>
                                    <li>
                                        <i class="flaticon-vehicle"></i> {{$property->garage}}
                                    </li>
                                    <li>
                                        <i class="flaticon-window"></i> 3 Balcony
                                    </li>
                                    <li>
                                        <i class="flaticon-monitor"></i> TV
                                    </li>
                                </ul>
                            </div>
                            <div class="footer clearfix">
                               <!--  <div class="pull-left days">
                                    <a><i class="fa fa-user icon"></i> {{$property->agent->name}}</a>
                                </div> -->
                                <div class="pull-right">
                                    <a><i class="flaticon-time icon"></i> {{$property->created_at->diffForHumans()}}</a>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                   @endforeach
                </div>
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                {!! $properties->render() !!}
                            </li>
                          
                        </ul>
                    </nav>
                </div>
    </div>
    
@endsection