<?php $__env->startSection('title',"Anasayfa Başlığı"); ?>
<?php $__env->startSection('content'); ?>
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">
                <?php ($count=0); ?>
                <?php $__currentLoopData = $data['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php if($count++==0): ?> active <?php endif; ?>"
                         style="background-image: url('/images/sliders/<?php echo e($slider->slider_file); ?>')">
                        <div class="carousel-caption d-none d-md-block">
                            <a href="<?php if(strlen($slider->slider_url)>0): ?> <?php echo e($slider->slider_url); ?> <?php else: ?> javascript:void(0) <?php endif; ?>">
                                <h3><?php echo e($slider->slider_title); ?></h3>
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
        <h2 class="mt-4">Blog</h2>

        <div class="row">

            <?php $__currentLoopData = $data['blog']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">

                        <a href="<?php echo e(route('blog.Detail',$blog->blog_slug)); ?>"><img class="card-img-top" src="/images/blogs/<?php echo e($blog->blog_file); ?>" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="<?php echo e(route('blog.Detail',$blog->blog_slug)); ?>"><?php echo e($blog->blog_title); ?></a>
                            </h4>
                            <p class="card-text"><?php echo substr($blog->blog_content,0,140); ?></p>
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
                <p><?php echo e($slogan); ?></p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">Bize Ulaşın</a>
            </div>
        </div>

    </div>
    <!-- /.container -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\ecms\resources\views/frontend/default/index.blade.php ENDPATH**/ ?>