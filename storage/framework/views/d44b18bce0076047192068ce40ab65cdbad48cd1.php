<?php $__env->startSection('context'); ?>
    <div class="col-lg-8 col-md-12" id="search_blogs">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="blog-1">
            <div class="blog-photo">
                <img src="<?php echo e(asset($post->image)); ?>" alt="blog-img" class="img-fluid" style="height: 350px">
                <div class="date-box">
                    <?php echo e($post->created_at->diffForHumans()); ?>

                </div>
            </div>
            <div class="detail">
                <h2>
                    <a href="<?php echo e(route('blog_detail', $post->id)); ?>"><?php echo e($post->title); ?></a>
                </h2>
                <div class="post-meta clearfix">
                    <span><a href="#" tabindex="0"><i class="fa fa-user"></i><?php echo e($post->user->name); ?></a></span>
                    <?php
                        $comments = $post->comments;
                        $length = count($comments);
                        if($length == 0){   
                            $comment = 0;
                        }else{
                            $comment = $length;
                        }
                    ?>

                    <span><a href="#" tabindex="0"><i class="fa fa-comment"></i><?php echo e($comment); ?></a></span>
                    <span><a href="#" tabindex="0"><i class="fa fa-heart-o"></i>27</a></span>
                </div>
                <p class="text-justify"><?php echo e(Str::limit($post->context, 250)); ?></p>
                <a href="<?php echo e(route('blog_detail', $post->id)); ?>" class="read-more">Read more</a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend/blog_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Property_Laravel_Project\resources\views/frontend/blog.blade.php ENDPATH**/ ?>