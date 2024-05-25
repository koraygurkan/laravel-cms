<?php $__env->startSection('title',"Anasayfa Başlığı"); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"><?php echo e($blog->blog_title); ?></h1>


        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="/images/blogs/<?php echo e($blog->blog_file); ?>" alt="">

                <hr>

                <!-- Date/Time -->
                <p> Yayınlama Zamanı <?php echo e($blog->created_at->format('d-m-Y h:i')); ?></p>

                <hr>

                <p><?php echo $blog->blog_content; ?></p>
                <hr>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">


                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Son Bloglar</h5>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php $__currentLoopData = $blogList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('blog.Detail',$list->blog_slug)); ?>"> <li  class="list-group-item "><?php echo e($list->blog_title); ?></li></a>
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
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\ecms\resources\views/frontend/blog/detail.blade.php ENDPATH**/ ?>