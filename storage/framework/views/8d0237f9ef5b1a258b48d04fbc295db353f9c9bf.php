<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Hakkımızda Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="<?php echo e(route('about.Update',$abouts->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>


                <?php if(isset($abouts->about_image)): ?>
                    <div class="form-group">
                        <label>Yüklü Görsel</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="/images/abouts/<?php echo e($abouts->about_image); ?>" width="200">
                            </div>
                        </div>
                    </div>
               <?php endif; ?>

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="about_image" >
                            </div>
                        </div>
                    </div>

                        <?php if(isset($abouts->about_video)): ?>
                            <div class="form-group">
                                <label>Yüklü Video</label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <video width="400px" height="200px" controls>
                                            <source src="/images/abouts/<?php echo e($abouts->about_video); ?>" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label>Video Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input class="form-control" type="file" name="about_video" >
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="about_title" value="<?php echo e($abouts->about_title); ?>">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>SEO Url - Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="about_slug" value="<?php echo e($abouts->about_slug); ?>">
                            </div>
                        </div>
                    </div>

                            <div class="form-group">
                                <label>İçerik</label>
                                <div class="row">
                                    <div class="col-xs-12">

                                           <textarea class="form-control" id="editor1" name="about_content"><?php echo e($abouts->about_content); ?></textarea>

                                        <script>
                                            CKEDITOR.replace('editor1');
                                        </script>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Durum</label>
                                <div class="row">
                                    <div class="col-xs-12">

                                <select name="about_status" class="form-control">
                                    <option <?php echo e($abouts->about_status=="1" ? "selected=''" : ""); ?> value="1">Aktif</option>
                                    <option <?php echo e($abouts->about_status=="0" ? "selected=''" : ""); ?> value="0">Pasif</option>
                                </select>

                                    </div>
                                </div>

                                <input type="hidden" name="old_image" value="<?php echo e($abouts->about_image); ?>">
                                <input type="hidden" name="old_video" value="<?php echo e($abouts->about_video); ?>">


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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/backend/abouts/edit.blade.php ENDPATH**/ ?>