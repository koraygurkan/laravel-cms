<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="<?php echo e(route('user.update',$users->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <?php if(isset($users->user_file)): ?>
                    <div class="form-group">
                        <label>Yüklü Görsel</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="/images/users/<?php echo e($users->user_file); ?>" width="100">
                            </div>
                        </div>
                    </div>
               <?php endif; ?>

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="user_file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="name" value="<?php echo e($users->name); ?>">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Kullanıcı Adı (E-Mail)</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" value="<?php echo e($users->email); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Şifre</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password">
                                <small>Şifreyi değiştirmek istemiyorsanız boş bırakın!</small>
                            </div>
                        </div>
                    </div>

                            <div class="form-group">
                                <label>Durum</label>
                                <div class="row">
                                    <div class="col-xs-12">

                                <select name="user_status" class="form-control">
                                    <option <?php echo e($users->user_status=="1" ? "selected=''" : ""); ?> value="1">Aktif</option>
                                    <option <?php echo e($users->user_status=="0" ? "selected=''" : ""); ?> value="0">Pasif</option>
                                </select>

                                    </div>
                                </div>

                                <input type="hidden" name="old_file" value="<?php echo e($users->user_file); ?>">


                                <div align="right" class="box-footer">
                                    <button class="btn btn-success" type="submit">Düzenle</button>
                                </div>
                            </div>

                </form>
            </div>
        </div>

    </section>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/backend/users/edit.blade.php ENDPATH**/ ?>