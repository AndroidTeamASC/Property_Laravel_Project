<?php $__env->startSection('context'); ?>
    <div class="col-lg-8 col-md-12" id="search_blogs">
                <!-- Blog box start -->
        <div class="blog-1 blog-big">
            <div class="blog-photo">
                <img src="<?php echo e(asset($post->image)); ?>" alt="blog-img" class="img-fluid" style="height: 350px">
            </div>
            <div class="detail">
                <h2>
                    <a href="#"><?php echo e($post->title); ?></a>
                </h2>
                <div class="post-meta clearfix mb-20">
                    <span><a href="#" tabindex="0"><i class="fa fa-user"></i><?php echo e($post->user->name); ?></a></span>
                    <span><a href="#" tabindex="0"><i class="fa fa-comment" id="total_comment_count"></i></a></span>
                    <span><a href="#" tabindex="0"><i class="fa fa-heart-o"></i>27</a></span>
                </div>
                <p class="text-justify"><?php echo e($post->context); ?></p>
            </div>
            <?php if(Auth::check()): ?>
            <h3 class="heading-2">Comments Here</h3>
            <div class="row clearfix">
                <div class="alert alert-primary alertMessage d-none float-left col-md-4 col-sm-2 offset-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea type="text" class="text-area form-control" id="comment" name="comment" autofocus rows="5" data-id="<?php echo e($post->id); ?>">
                    </textarea>
                </div>
            </div>
            <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('blog_detail_script'); ?>
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
        var comments_count = 0;
        var reply_comments_count = 0;
        var post_id = $('#comment').data('id');
        var url="<?php echo e(route('get_comment')); ?>";
        $.ajax({
          type:'get',
          url: "<?php echo e(route('get_comment')); ?>",
          data: {'post_id':post_id},
          success: (data) => {
            var j=1;
            var html='';
            console.log(data);
            $.each(data.comments,function(i,v){
                comments_count +=1;
                console.log(v.image);
                html+=`<li>
                        <div class="comment">
                            <div class="comment-author">
                                <a href="#">
                                    <img src="<?php echo e(asset('${v.image}')); ?>" alt="comments-user">
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
                                reply_comments_count +=1;
                                html+= ` <ul>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="<?php echo e(asset('${k.image}')); ?>" alt="comments-user">
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
            console.log(comments_count,reply_comments_count)
            var total_comment_count = comments_count + reply_comments_count
            $('#total_comment_count').html(total_comment_count)
            $('#comments').html(html);
          },
          error: function(error){
            console.log(error)
          }
      });
     
    } 
    $('#comment').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            var comment = $(this).val();
            var post_id = $('#comment').data('id');
            $.ajax({
              data: {'comment':comment, 'post_id':post_id},
              url: "<?php echo e(route('comment.store')); ?>",
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
        }
    });
    $('#comments').on('click','.comment_reply',function (argument) {
        var comment_id = $(this).data('id')
        var html = `<div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea type="text" class="text-area form-control" id="comment${comment_id}" name="comment" autofocus rows="3" data-id="<?php echo e($post->id); ?>">
                            </textarea>
                        </div>
                    </div>`
        $("#parent"+comment_id).append(html)
        $('#target').keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    var value = $(this).val();
                    alert(value);
                }
            });
        $('#comments').on('keypress','#comment'+comment_id,function (argument) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                var comment = $(this).val();
                $.ajax({
                  data: {'comment':comment, 'comment_id':comment_id},
                  url: "<?php echo e(route('comment_reply.store')); ?>",
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
            }
        })
    })
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend/blog_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Property_Laravel_Project/resources/views/frontend/blog_detail.blade.php ENDPATH**/ ?>