<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body">
                <form action="<?php echo e(route('settings.Update',['id' => $settings->id])); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" readonly type="text"
                                       value="<?php echo e($settings->settings_description); ?>">
                            </div>
                        </div>
                    </div>

                    <?php if($settings->settings_type=="file"): ?>
                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input class="form-control" name="settings_value" required type="file">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <?php if($settings->settings_type=="text"): ?>
                                    <input class="form-control" type="text" name="settings_value" required
                                           value="<?php echo e($settings->settings_value); ?>">
                                <?php endif; ?>

                                <?php if($settings->settings_type=="textarea"): ?>
                                    <textarea class="form-control"
                                              name="settings_value"><?php echo e($settings->settings_value); ?></textarea>
                                <?php endif; ?>

                                <?php if($settings->settings_type=="ckeditor"): ?>
                                    <textarea class="form-control" id="editor1"
                                              name="settings_value"><?php echo e($settings->settings_value); ?></textarea>
                                <?php endif; ?>

                                    <?php if($settings->settings_type=="file"): ?>
                                        <img width="100" src="/images/settings/<?php echo e($settings->settings_value); ?>" alt="">
                                    <?php endif; ?>

                                    <script>
                                        CKEDITOR.replace('editor1');
                                    </script>

                            </div>
                        </div>

                        <?php if($settings->settings_type=="file"): ?>
                            <input type="hidden" name="old_file" value="<?php echo e($settings->settings_value); ?>">
                        <?php endif; ?>

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success">Düzenle</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\ecms\resources\views/backend/settings/edit.blade.php ENDPATH**/ ?>