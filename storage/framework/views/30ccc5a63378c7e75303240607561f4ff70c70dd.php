<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Açıklama</th>
                        <th>İçerik</th>
                        <th>Anahtar Değer</th>
                        <th>Type</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    <?php $__currentLoopData = $data['adminSettings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="item-<?php echo e($adminSettings->id); ?>">
                            <td><?php echo e($adminSettings->id); ?></td>
                            <td class="sortable"><?php echo e($adminSettings['settings_description']); ?></td>
                            <td>

                                <?php if($adminSettings['settings_type']=="file"): ?>
                                    <img width="100" src="/images/settings/<?php echo e($adminSettings['settings_value']); ?>" alt="">
                                <?php else: ?>
                                    <?php echo e($adminSettings->settings_value); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($adminSettings->settings_key); ?></td>
                            <td><?php echo e($adminSettings->settings_type); ?></td>
                            <td width="5"><a href="<?php echo e(route('settings.Edit',['id' => $adminSettings->id])); ?>"><i class="fa fa-pencil-square"></i></a></td>
                            <td width="5">
                                <?php if($adminSettings->settings_delete): ?>
                                    <a href="javascript:void(0)"><i id="<?php echo $adminSettings->id ?>"
                                                                    class="fa fa-trash-o"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "<?php echo e(route('settings.Sortable')); ?>",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("İşlem Başarılı");
                            } else {
                                alertify.error("İşlem Başarısız");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Silme işlemini onaylayın!', 'Bu işlem geri alınamaz',
                function () {
                    location.href = "/nedmin/settings/delete/" + destroy_id;
                },
                function () {
                    alertify.error('Silme işlemi iptal edildi')
                }
            )

        });
    </script>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\ecms\resources\views/backend/settings/index.blade.php ENDPATH**/ ?>