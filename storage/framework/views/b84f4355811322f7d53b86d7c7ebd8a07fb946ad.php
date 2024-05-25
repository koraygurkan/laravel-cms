<?php $__env->startSection('title',"Ana Sayfa Başlığı"); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Blog
            <small>Blog Listesi</small>
        </h1>
 <!--
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Blog Home 2</li>
        </ol>
-->

        <?php $__currentLoopData = $data['blog']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="<?php echo e(route('blog.Detail',$blog->blog_slug)); ?>">
                            <!-- 750x300 -->
                            <img class="img-fluid rounded" src="/images/blogs/<?php echo e($blog->blog_file); ?>" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="card-title"><?php echo e($blog->blog_title); ?></h2>
                        <p class="card-text"><?php echo substr($blog->blog_content,0,300); ?></p>
                        <a href="<?php echo e(route('blog.Detail',$blog->blog_slug)); ?>" class="btn btn-primary">Devamını Oku &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                Yayınlama Zamanı <?php echo e($blog->created_at->format('d-m-y h:i')); ?>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <!-- Pagination sayfalama
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>
        -->
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/frontend/blog/index.blade.php ENDPATH**/ ?>