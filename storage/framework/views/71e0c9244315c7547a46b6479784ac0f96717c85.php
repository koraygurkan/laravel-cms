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
                        <th scope="col">Ad</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Mesaj</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    <?php $__currentLoopData = $data['contact']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="item-<?php echo e($contacts->id); ?>">
                            <th scope="row"><?php echo e($contacts->id); ?></th> <!-- BU DİZİ OLARAK ÇEKME ALTTAKİ NESNE OLARAK ÇEKMEDİR-->
                            <td class="sortable"><?php echo e($contacts->contact_ad); ?></td> <!-- NESNE OLARAK ÇEKME! -->
                            <td>
                                <?php echo e($contacts->contact_email); ?>

                            </td>

                            <td><?php echo e($contacts->contact_phone); ?></td>
                            <td><?php echo e($contacts->contact_mesaj); ?></td>

                            <td width="5">

                                <a href="javascript:void(0)"><i id="<?php echo $contacts->id ?>" class="fa fa-trash-o"></i></a>

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
                        url: "<?php echo e(route('contact.Sortable')); ?>",
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
                    location.href="/yonetim/contact/delete/"+destroy_id;
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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/backend/contacts/index.blade.php ENDPATH**/ ?>