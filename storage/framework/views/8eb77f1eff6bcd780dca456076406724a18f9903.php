<?php $__env->startSection('title',"İletişim"); ?>
<?php $__env->startSection('content'); ?>
  <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Bize Ulaşın</h1>
      <HR>
<!--
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <a href="index.html">Home</a>
          </li>
          <li class="breadcrumb-item active">Contact</li>
      </ol>
!-->

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
              <form method="POST" action=<?php echo e(route('sendPost')); ?> enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Ad Soyad:</label>
                          <input type="text" class="form-control" name="contact_ad">
                          <p class="help-block"></p>
                      </div>
                  </div>

                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Tel No:</label>
                          <input type="tel" class="form-control" name="contact_phone">
                          <p class="help-block"></p>
                      </div>
                  </div>

                  <div class="control-group form-group">
                      <div class="controls">
                          <label>E-mail Adres:</label>
                          <input type="email" class="form-control" name="contact_email">
                          <p class="help-block"></p>
                      </div>
                  </div>


                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Mesaj:</label>
                          <textarea rows="10" cols="100" class="form-control" name="contact_mesaj"></textarea>
                          <div class="help-block"></div></div>
                  </div>
                  <div id="success"></div>
                  <!-- For success/fail messages -->
                  <button type="submit" class="btn btn-primary">Gönder</button>
              </form>
          </div>

          <!-- Contact Details Column -->
          <div class="col-lg-4 mb-4">
              <h3>Adres Detayları</h3>
              <p>
                    <?php echo $adres; ?>

                  <br><?php echo e($ilce); ?> / <?php echo e($il); ?>

                  <br><?php echo e($phone_gsm); ?>

                  <br> <?php echo e($phone_sabit); ?>

                  <br><a href="mailto:<?php echo e($mail); ?>"><?php echo e($mail); ?></a>
              </p>

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
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/frontend/default/contact.blade.php ENDPATH**/ ?>