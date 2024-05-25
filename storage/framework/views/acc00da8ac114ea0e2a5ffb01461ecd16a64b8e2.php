<?php $__env->startSection('title',"Ana Sayfa"); ?>
<?php $__env->startSection('content'); ?>
    <h1 style="display: none"><?php echo e($title); ?></h1>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <!-- Çizgiler !-->
        <?php ($counts=0); ?>
        <ol class="carousel-indicators">
            <?php for($i=0; $i<=count($data['slider'])-1; $i++ ): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($i); ?>" class="<?php if($counts++==0): ?> active <?php endif; ?>"></li>
            <?php endfor; ?>
        </ol>

        <div class="carousel-inner" role="listbox">
            <?php ($count=0); ?>
            <?php $__currentLoopData = $data['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php if($count++==0): ?> active <?php endif; ?>" style="background-image: url('/images/sliders/<?php echo e($sliders->slider_file); ?>')">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="<?php if(strlen($sliders->slider_url)>0): ?><?php echo e($sliders->slider_url); ?><?php else: ?> javascript:void(0)" <?php endif; ?>" target="_blank">
                            <h3><?php echo e($sliders->slider_title); ?></h3>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<!-- Page Content -->
<div class="container">

    <!-- Portfolio Section -->
    <p><h2>Blog</h2></p>

    <div class="row">
        <?php $__currentLoopData = $data['blog']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="<?php echo e(route('blog.Detail',$blog->blog_slug)); ?>"><img class="card-img-top" src="/images/blogs/<?php echo e($blog->blog_file); ?>" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="<?php echo e(route('blog.Detail',$blog->blog_slug)); ?>"><?php echo e($blog->blog_title); ?></a>
                        </h4>
                        <p class="card-text"><?php echo substr($blog->blog_content,0,160); ?>...</p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-6">
            <h2><?php echo e($home_title); ?></h2>
            <?php echo $home_detail; ?>


        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded" src="/images/settings/<?php echo e($home_image); ?>" alt="">
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
        <div class="col-md-8">
       
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="<?php echo e(route('contact.Detail')); ?>">Bize Ulaşın</a>
        </div>
    </div>

</div>
<!-- /.container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/frontend/default/index.blade.php ENDPATH**/ ?>