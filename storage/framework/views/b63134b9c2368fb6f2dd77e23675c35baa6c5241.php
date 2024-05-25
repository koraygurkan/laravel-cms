<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Slider</h3>
                <div align="right">
                    <a href="<?php echo e(route('slider.create')); ?>"><button class="btn btn-success">Ekle</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Görsel</th>
                        <th scope="col">Başlık</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    <?php $__currentLoopData = $data['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="item-<?php echo e($slider['id']); ?>">
                        <td width="150" class="sortable"><img src="/images/sliders/<?php echo e($slider->slider_file); ?>" width="150"></td>
                        <td><?php echo e($slider->slider_title); ?></td> <!-- NESNE OLARAK ÇEKME! -->

                        <td width="5"><a href="<?php echo e(route('slider.edit',$slider->id)); ?>"><i class="fa fa-pencil-square"></i></a> </td>
                        <td width="5">
                            <a href="javascript:void(0)"><i id="<?php echo $slider->id ?>" class="fa fa-trash-o"></i></a>
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
                    url: "<?php echo e(route('slider.Sortable')); ?>",
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

        function ()
        {
            $.ajax({
                type:"DELETE",
                url:"slider/"+destroy_id,
                success: function (msg)
                {
                    if (msg)
                    {
                        $("#item-"+destroy_id).remove();
                        alertify.success("Silme işlemi başarılı!");
                    } else
                    {
                        alertify.error("İşlem Tamamlanamadı!");
                    }
                }
            });
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

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/koraygurkandanaci.com/cms.koraygurkandanaci.com/resources/views/backend/sliders/index.blade.php ENDPATH**/ ?>