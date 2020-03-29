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
						        <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Blog Details Right Sidebar</h2>
                                        <ul class="breadcrumbs">
                                            <li><a href="index.html">Home</a></li>
                                            <li class="active"><span>/</span>Blog Details Right Sidebar</li>
                                        </ul>
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
@section('featured_properties')
    <div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- Blog box start -->
                <div class="blog-1 blog-big">
                    <div class="blog-photo">
                        <img src="{{asset($post->image)}}" alt="blog-img" class="img-fluid" style="height: 350px">
                    </div>
                    <div class="detail">
                        <h2>
                            <a href="#">{{$post->title}}</a>
                        </h2>
                        <div class="post-meta clearfix mb-20">
                            <span><a href="#" tabindex="0"><i class="fa fa-user"></i>{{$post->user->name}}</a></span>
                            <span><a href="#" tabindex="0"><i class="fa fa-comment"></i>27</a></span>
                            <span><a href="#" tabindex="0"><i class="fa fa-heart-o"></i>27</a></span>
                        </div>
                        <p class="text-justify">{{$post->context}}</p>
                    </div>
                    @if(Auth::check())
                    <h3 class="heading-2">Comments Here</h3>
                    <div class="row clearfix">
                        <div class="alert alert-primary alertMessage d-none float-left col-md-4 col-sm-2 offset-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea type="text" class="text-area form-control" id="comment" name="comment" autofocus rows="5" data-id="{{$post->id}}">
                            </textarea>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- Heading 2 start -->
                <h3 class="heading-2">Comments Section</h3>
                <!-- Comments start -->
                <ul class="comments" id="comments">
                    
                </ul>
                <br>
                <!-- Contact 1 start -->
                <div class="contact-1 mb-30">
                    <h3 class="heading">Contact Form</h3>
                    <form action="#" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group name">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group email">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group subject">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group number">
                                    <input type="text" name="phone" class="form-control" placeholder="Number">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group message">
                                    <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-md button-theme">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    getComment()
    var myStopTimer = setInterval(Timer,3000)

        $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    })
    function Timer() {
     $('.alertMessage').addClass('d-none');
    }

    function getComment(){
        var post_id = $('#comment').data('id');
        var url="{{route('get_comment',':id')}}";
        url=url.replace(':id',post_id);
        $.ajax({
          type:'get',
          url: url,
          processData: false,
          contentType: false,
          success: (data) => {
            var j=1;
            var html='';
            console.log(data);
            $.each(data.comments,function(i,v){
              html+=`<li>
                        <div class="comment">
                            <div class="comment-author">
                                <a href="#">
                                    <img src="{{asset('${v.image}')}}" alt="comments-user">
                                </a>
                            </div>
                            <div class="comment-content" id="parent${v.c_id}">
                                <div class="comment-meta" id="meta2">
                                    <h3>
                                        ${v.name}
                                    </h3>
                                    <div class="comment-meta" id="meta">
                                        ${v.created_at}<a href="javascript:void(0)" class="comment_reply" data-id="${v.c_id}">Reply</a>
                                    </div>
                                </div>
                                <p>${v.comment}</p>
                            </div>
                        </div>`;

                        $.each(data.reply_comments,function (j,k) {
                            console.log(j,k)
                            if (v.c_id == k.comment_id) {
                                html+= ` <ul>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="{{asset('${k.image}')}}" alt="comments-user">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <h3>
                                                ${k.name}
                                            </h3>
                                            <div class="comment-meta">
                                                ${k.created_at}
                                            </div>
                                        </div>
                                        <p>${k.comment}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>`
                            }
                        })
                        
                    html+= `</li>`;
            });
            $('#comments').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });  
    } 
    $('#comment').change(function () {
        var comment = $(this).val();
        var post_id = $('#comment').data('id');
        $.ajax({
          data: {'comment':comment, 'post_id':post_id},
          url: "{{ route('comment.store') }}",
          type: "POST",
          success: function (data) {
              console.log(data)
              $('.alertMessage').removeClass('d-none');
              $('.alertMessage').text(data.success);
              getComment();
              setInterval(Timer, 3000);
              $('#comment').val('');
          },
          error: function (error) {
          }
      })
    })
    $('#comments').on('click','.comment_reply',function (argument) {
        var comment_id = $(this).data('id')
        var html = `<div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea type="text" class="text-area form-control" id="comment${comment_id}" name="comment" autofocus rows="3" data-id="{{$post->id}}">
                            </textarea>
                        </div>
                    </div>`
        $("#parent"+comment_id).append(html)
        $('#comments').on('change','#comment'+comment_id,function (argument) {
        var comment = $(this).val();
            $.ajax({
              data: {'comment':comment, 'comment_id':comment_id},
              url: "{{ route('comment_reply.store') }}",
              type: "POST",
              success: function (data) {
                  console.log(data)
                  $('.alertMessage').removeClass('d-none');
                  $('.alertMessage').text(data.success);
                  getComment();
                  setInterval(Timer, 3000);
                  $("#parent"+comment_id).hide()
              },
              error: function (error) {
              }
          })
        })
    })

  $('tbody').on('click', '.editPost', function () {
      $('.alertMessage').addClass('d-none');
      var post_id = $(this).data('id');
      var url="{{route('admin.post.edit',':id')}}";
      url=url.replace(':id',post_id);
        $.ajax({
          url: url,
          type: "GET",
          dataType: 'json',
          success: function (data) {
              $('#edit_modelHeading').html("Edit Post");
              $('#editSaveBtn').text("Update");
              $('#editPostModal').modal('show');
              $('#edit_post_id').val(data.id);
              $('#edit_title').val(data.title);
              $('#edit_context').val(data.context);
              $('#old_image').val(data.image);
              $('.old_image').attr('src',`{{asset('${data.image}')}}`);
          },
          error: function (error) {
          }
        })
   })
  });
</script>
@endsection