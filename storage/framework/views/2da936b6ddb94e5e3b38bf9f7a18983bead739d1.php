<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ayarlar</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">İçerik</th>
                        <th scope="col">Anahtar Değer</th>
                        <th scope="col">Type</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    <?php $__currentLoopData = $data['adminSettings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminSettings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="item-<?php echo e($adminSettings['id']); ?>">
                        <th scope="row"><?php echo e($adminSettings['id']); ?></th> <!-- BU DİZİ OLARAK ÇEKME ALTTAKİ NESNE OLARAK ÇEKMEDİR-->
                        <td class="sortable"><?php echo e($adminSettings->settings_description); ?></td> <!-- NESNE OLARAK ÇEKME! -->
                        <td>


                            <?php if($adminSettings->settings_type=="file"): ?>
                                <img src="/images/settings/<?php echo e($adminSettings->settings_value); ?>" width="100">
                            <?php else: ?>
                                <?php echo e($adminSettings->settings_value); ?>

                            <?php endif; ?>
                        </td>

                        <td><?php echo e($adminSettings->settings_key); ?></td>
                        <td><?php echo e($adminSettings->settings_type); ?></td>
                        <td width="5"><a href="<?php echo e(route('settings.Edit',['id'=>$adminSettings->id])); ?>"><i class="fa fa-pencil-square"></i></a> </td>
                        <td width="5">
                            <?php if($adminSettings->settings_delete): ?>
                              <a href="javascript:void(0)"><i id="<?php echo $adminSettings->id ?>" class="fa fa-trash-o"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
    $(function()
    {
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


        $('#sortable').sortable
        ({
            revert: true,
            handle: ".sortable",
            stop: function (event, ui)
            {
                var data= $(this).sortable('serialize');

                $.ajax({
                    type: "POST",
                    data: data,
                    url: "<?php echo e(route('settings.Sortable')); ?>",
                    success: function (msg) {
                        // console.log(msg);
                        if (msg) {
                            // alert("işlem başarılı");
                            alertify.success("İşlem Başarılı!");
                        } else {
                            // alert("işlem başarısız");
                            alertify.error("İşlem Başarısız!");
                        }
                    }
                });
            }
        });
        $('#sortable').disableSelection();
    });

    $(".fa-trash-o").click(function (){
        destroy_id=$(this).attr('id');

        alertify.confirm('Silme İşlemini Onaylayın!','Bu işlem geri alınamaz!',
        function () {
          location.href="/yonetim/ayarlar/delete/"+destroy_id;
        },
        function () {
            alertify.error("Silme İşlemi İptal Edildi");
        }
        )
    })

    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/backend/settings/index.blade.php ENDPATH**/ ?>