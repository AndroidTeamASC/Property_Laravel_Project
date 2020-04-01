<?php $__env->startSection('banner'); ?>
    <div class="banner" id="banner">
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo e(asset('frontend_template/img/banner.jpg')); ?>" alt="banner" style="height: 400px;">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('featured_properties'); ?>
    <div class="blog-body content-area">
        <div class="container">
            <div class="row">
                <?php echo $__env->yieldContent('context'); ?>
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
                                    <input type="text" class="form-control" id="keyword" placeholder="Looking for something">
                                </div>
                                <button type="button" class="btn" id="search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Posts by Category Start -->
                        <div class="posts-by-category widget">
                            <h3 class="sidebar-title">Popular Category</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="list-unstyled list-cat">
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="blog?type_id=<?php echo e($type->id); ?>"><?php echo e($type->type); ?><span>
                                    <?php if($type->type =="House"): ?><?php echo e($houses); ?>

                                    <?php elseif($type->type =="Apartment"): ?><?php echo e($apartments); ?>

                                    <?php elseif($type->type =="Office"): ?><?php echo e($offices); ?>

                                    <?php elseif($type->type =="Villa"): ?><?php echo e($villas); ?>

                                    <?php endif; ?>
                                </span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- Popular posts start -->
                        <div class="widget popular-posts">
                            <h3 class="sidebar-title">Popular Posts</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <?php $__currentLoopData = $popular_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="<?php echo e(asset($popular_post->image)); ?>" alt="sub-properties">
                                </div>
                                <div class="media-body align-self-center">
                                    <h3 class="media-heading">
                                        <a href="blog_detail/<?php echo e($popular_post->id); ?>"><?php echo e($popular_post->title); ?></a>
                                    </h3>
                                    <p><?php echo e($popular_post->created_at); ?> | <?php echo e($popular_post->type->type); ?></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function (argument) {
            jQuery("time.timeago").timeago();
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              }
            })
            $('#search').click(function (argument) {
                var keyword = $('#keyword').val()
                console.log(keyword)
                var url="<?php echo e(route('blog_search')); ?>"
                $.ajax({
                  type:'POST',
                  url: url,
                  data: {'keyword':keyword},
                  success: (data) => {
                    var j=1;
                    var html='';
                    $.each(data, function (i,v) {
                        var date = jQuery.timeago(v.created_at);
                        var context = v.context;
                        var post_id = v.p_id;
                        var new_context = context.substring(0, 250);
                        var url="<?php echo e(route('blog_detail',':id')); ?>";
                        url=url.replace(':id',post_id); 
                        html += `<div class="blog-1">
                        <div class="blog-photo">
                            <img src="<?php echo e(asset('${v.p_image}')); ?>" alt="blog-img" class="img-fluid" style="height: 350px">
                            <div class="date-box">
                                ${date}
                            </div>
                        </div>
                        <div class="detail">
                            <h2>
                                <a href="${url}">${v.title}</a>
                            </h2>
                            <div class="post-meta clearfix">
                                <span><a href="#" tabindex="0"><i class="fa fa-user"></i>${v.name}</a></span>

                                <span><a href="#" tabindex="0"><i class="fa fa-comment"></i>0</a></span>
                                <span><a href="#" tabindex="0"><i class="fa fa-heart-o"></i>27</a></span>
                            </div>
                            <p class="text-justify">${new_context} .....</p>
                            <a href="${url}" class="read-more">Read more</a>
                        </div>
                    </div>`
                    })
                    $('#search_blogs').html(html)
                  },
                  error: function(error){
                    console.log(error)
                  }
              })
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend/frontend_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/property/resources/views/frontend/blog_template.blade.php ENDPATH**/ ?>