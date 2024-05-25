<?php $__env->startSection('title',"Ana Sayfa Başlığı"); ?>
<?php $__env->startSection('content'); ?>

<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?php echo e($page->page_title); ?></h1>
<!--
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog Home 2</li>
    </ol>
-->
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="/images/pages/<?php echo e($page->page_file); ?>" alt="">

            <hr>

            <!-- Date/Time -->
            <p>Yayınlama Zamanı <?php echo e($page->created_at->format('d-m-y h:i')); ?></p>

            <hr>

            <!-- Post Content -->
            <p>
                <?php echo $page->page_content; ?>

            </p>
            <hr>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

-
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Güncel Sayfalar</h5>
                <div class="card-body">
                    <ul class="list-group">
                        <?php $__currentLoopData = $pageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('page.Detail',$list->page_slug)); ?>">
                                <li class="list-group-item"><?php echo e($list->page_title); ?></li>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/frontend/page/detail.blade.php ENDPATH**/ ?>