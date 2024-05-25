<?php $__env->startSection('title',"Ana Sayfa Başlığı"); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Hakkımızda

        </h1>
 <!--
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Blog Home 2</li>
        </ol>
-->

        <?php $__currentLoopData = $datam['abouts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abouts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">

                            <!-- 750x300 -->
                            <img class="img-fluid rounded" src="/images/abouts/<?php echo e($abouts->about_image); ?>" alt="">

                    </div>

                    <div class="col-lg-4">
                        
                        <!-- 750x300 -->
                        <video width="300" height="300" controls>
                            <source src="/images/abouts/<?php echo e($abouts->about_video); ?>" type="video/mp4">
                        </video>
                        
                    </div>

                    <div class="col-lg-4">
                        <h2 class="card-title"><?php echo e($abouts->about_title); ?></h2>
                        <p class="card-text"><?php echo substr($abouts->about_content,0,300); ?></p>

                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">

                <?php if(isset($abouts->created_at)): ?>

                   Yayınlama Zamanı <?php echo e($abouts->created_at->format('d-m-y h:i')); ?>


                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/frontend/default/about.blade.php ENDPATH**/ ?>