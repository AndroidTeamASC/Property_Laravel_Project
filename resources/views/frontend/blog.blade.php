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
						            <h1>Blog Grid</h1>
						            <ul>
						                <li><a href="index.html">Index</a></li>
						                <li><span>/</span>Blog Grid</li>
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
    <div class="blog-body content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @foreach($posts as $post)
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="{{asset($post->image)}}" alt="blog-img" class="img-fluid" style="height: 350px">
                            <div class="date-box">
                                {{$post->created_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="detail">
                            <h2>
                                <a href="{{route('blog_detail', $post->id)}}">{{$post->title}}</a>
                            </h2>
                            <div class="post-meta clearfix">
                                <span><a href="#" tabindex="0"><i class="fa fa-user"></i>{{$post->user->name}}</a></span>
                                @php
                                    $comments = $post->comments;
                                    $length = count($comments);
                                    if($length == 0){   
                                        $comment = 0;
                                    }else{
                                    $comment = count($post->comments);
                                    }
                                @endphp

                                <span><a href="#" tabindex="0"><i class="fa fa-comment"></i>{{$comment}}</a></span>
                                <span><a href="#" tabindex="0"><i class="fa fa-heart-o"></i>27</a></span>
                            </div>
                            <p class="text-justify">{{$post->context}}</p>
                            <a href="{{route('blog_detail', $post->id)}}" class="read-more">Read more</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-right">
                        <!-- Search box -->
                        <div class="widget search-box">
                            <h3 class="sidebar-title">Search</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <form class="form-inline form-search" method="GET">
                                <div class="form-group">
                                    <label class="sr-only" for="textsearch2">Looking for something</label>
                                    <input type="text" class="form-control" id="textsearch2" placeholder="Looking for something">
                                </div>
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Posts by Category Start -->
                        <div class="posts-by-category widget">
                            <h3 class="sidebar-title">Popular Category</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="list-unstyled list-cat">
                                <li><a href="#">Single Family <span>(45)</span></a></li>
                                <li><a href="#">Apartment <span>(21)</span> </a></li>
                                <li><a href="#">Condo <span>(23)</span></a></li>
                                <li><a href="#">Multi Family <span>(19)</span></a></li>
                                <li><a href="#">Villa <span>(19)</span></a> </li>
                                <li><a href="#">Other <span>(22) </span></a></li>
                            </ul>
                        </div>
                        <!-- Popular posts start -->
                        <div class="widget popular-posts">
                            <h3 class="sidebar-title">Popular Posts</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="media-heading">
                                        <a href="#">Modern Design Building</a>
                                    </h3>
                                    <p>Apr 15, 2019 | $2041,000</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="media-heading">
                                        <a href="#">Real Eatate Expo 2018</a>
                                    </h3>
                                    <p>Feb 27, 2019 | $1045,000</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="http://placehold.it/60x60" alt="sub-properties">
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="media-heading">
                                        <a href="#">Villa in Coral Gables</a>
                                    </h3>
                                    <p>Apr 21, 2019 | $545,000</p>
                                </div>
                            </div>
                        </div>
                        <!-- Tags box Start -->
                        <div class="widget tags-box">
                            <h3 class="sidebar-title">Popular Tags</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="tags">
                                <li><a href="#">Image</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Slideshow</a></li>
                                <li><a href="#">Post Formats</a></li>
                                <li><a href="#">Typography</a></li>
                                <li><a href="#">Best Sellers</a></li>
                                <li><a href="#">WooCommerce</a></li>
                                <li><a href="#">Shortcodes</a></li>
                            </ul>
                        </div>
                        <!-- Latest reviews Start -->
                        <div class="widget latest-reviews">
                            <h3 class="sidebar-title">Latest Reviews</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="avatar-1">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Emma Connor</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiamrisus tortor, accumsan</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="avatar-2">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Martin Smith</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiamrisus tortor, accumsan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection