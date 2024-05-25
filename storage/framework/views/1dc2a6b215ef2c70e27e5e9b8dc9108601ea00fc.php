<?php $__env->startSection('title',"Anasayfa Başlığı"); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Bize Ulaşın</h1>
        <HR>

        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
               <p><?php echo e(session('success')); ?></p>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

    <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-8 mb-4">
                <h3>İletişim Formu</h3>

                <form method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Ad Soyad</label>
                            <input class="form-control" type="text" name="name" placeholder="Ad Soyad" >
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Mail</label>
                            <input class="form-control" type="email" name="email" placeholder="Mail" >
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Telefon</label>
                            <input class="form-control" type="text" name="phone" placeholder="phone" >
                        </div>
                    </div>


                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Mesaj</label>
                            <textarea rows="10" cols="100" class="form-control" name="message" ></textarea>
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Gönder</button>
                </form>
            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3>Adres Detayları</h3>

                <?php echo $adres; ?>

                <br>
                <?php echo e($ilce); ?> / <?php echo e($il); ?>

                <br>
                <?php echo e($phone_gsm); ?>

                <br>
                <?php echo e($phone_sabit); ?>

                <br>
                <?php echo e($mail); ?>



            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->

        <!-- /.row -->

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\ecms\resources\views/frontend/default/contact.blade.php ENDPATH**/ ?>