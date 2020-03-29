@extends('frontend/frontend_template')
@section('banner')
    <div class="banner" id="banner">
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('frontend_template/img/banner.jpg')}}" alt="banner" style="height: 400px;">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="sub-banner">
						    <div class="container">
						        <div class="page-name">
						            <h1>Agent Grid</h1>
						            <ul>
						                <li><a href="index.html">Index</a></li>
						                <li><span>/</span>Agent Grid</li>
						            </ul>
						        </div>
						    </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('featured_properties')
    <div class="our-team-3 content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="option-bar">
                        <div class="float-left">
                            <h4>
                                <span class="heading-icon">
                                    <i class="fa fa-th-large"></i>
                                </span>
                                <span class="title-name">Agent Grid</span>
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
                                <a href="agent-list-2.html" class="change-view-btn"><i class="fa fa-th-list"></i></a>
                                <a href="agent-grid-2.html" class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                @foreach($agents as $agent)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-2">
                        <div class="team-photo">
                            <img src="{{asset($agent->image)}}" alt="agent-2" class="img-fluid" style="height: 300px">
                        </div>
                        <div class="team-details">
                            <h6>Office Manager</h6>
                            <h5><a href="agent-detail.html">{{$agent->name}}</a></h5>
                            <div class="contact">
                                <p>
                                    <a href="mailto:info@themevessel.com"><i class="fa fa-envelope-o"></i>{{$agent->email}}</a>
                                </p>
                                <p>
                                    <a href="tel:+554XX-634-7071"> <i class="fa fa-phone"></i>{{$agent->phone_no}}</a>
                                </p>
                                <p>
                                    <a href="#"><i class="fa fa-map"></i>{{$agent->address}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div >
@endsection