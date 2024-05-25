<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Slider Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="<?php echo e(route('slider.update',$sliders->id)); ?>" method="post"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <?php if(isset($sliders->slider_file)): ?>
                    <div class="form-group">
                        <label>Yüklü Görsel</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="/images/sliders/<?php echo e($sliders->slider_file); ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="slider_file"  type="file">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_title" value="<?php echo e($sliders->slider_title); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_slug" value="<?php echo e($sliders->slider_slug); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Url</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="slider_url" value="<?php echo e($sliders->slider_url); ?>">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1"
                                              name="slider_content"><?php echo e($sliders->slider_title); ?></textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>İçerik</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select name="slider_status" class="form-control">
                                        <option <?php echo e($sliders->slider_status=="1" ? "selected=''" : ""); ?> value="1">Aktif</option>
                                        <option <?php echo e($sliders->slider_status=="0" ? "selected=''" : ""); ?> value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="old_file" value="<?php echo e($sliders->slider_file); ?>">



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
<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\ecms\resources\views/backend/sliders/edit.blade.php ENDPATH**/ ?>