@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sayfalar</h3>
                <div align="right">
                    <a href="{{route('page.create')}}"><button class="btn btn-success">Ekle</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Başlık</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($data['page'] as $page)
                    <tr id="item-{{$page['id']}}">
                        <td class="sortable">{{$page->page_title}}</td> <!-- NESNE OLARAK ÇEKME! -->

                        <td width="5"><a href="{{route('page.edit',$page->id)}}"><i class="fa fa-pencil-square"></i></a> </td>
                        <td width="5">
                            <a href="javascript:void(0)"><i id="@php echo $page->id @endphp" class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
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
                    url: "{{route('page.Sortable')}}",
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
                url:"page/"+destroy_id,
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

@endsection
@section('css')@endsection
@section('js')@endsection
