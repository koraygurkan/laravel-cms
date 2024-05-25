<?php $__env->startSection('content'); ?>
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Pages</h3>

                <div align="right">
                    <a href="<?php echo e(route('page.create')); ?>"><button class="btn btn-success">Ekle</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Başlık</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    <?php $__currentLoopData = $data['page']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="item-<?php echo e($page->id); ?>">
                            <td class="sortable"><?php echo e($page['page_title']); ?></td>
                            <td width="5"><a href="<?php echo e(route('page.edit',$page->id)); ?>"><i class="fa fa-pencil-square"></i></a></td>
                            <td width="5">
                                <a href="javascript:void(0)"><i id="<?php echo $page->id ?>"
                                                                class="fa fa-trash-o"></i></a>
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
                        url: "<?php echo e(route('page.Sortable')); ?>",
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

                $.ajax({
                    type:"DELETE",
                    url:"page/"+destroy_id,
                    success: function (msg) {
                        if (msg)
                        {
                            $("#item-"+destroy_id).remove();
                            alertify.success("Silme İşlemi Başarılı");

                        } else {
                            alertify.error("İşlem Tamamlanamadı");
                        }
                    }
                });

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
<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\AppServ\www\ecms\resources\views/backend/pages/index.blade.php ENDPATH**/ ?>