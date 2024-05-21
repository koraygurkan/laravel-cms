@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Hakkımızda</h3>
                <div align="right">
                    <a href="{{route('about.Insert')}}"><button class="btn btn-success">Ekle</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Görsel</th>
                        <th scope="col">Video </th>
                        <th scope="col">Başlık</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($abouts as $about)
                    <tr id="item-{{$about['id']}}">
                        <td width="250" class="sortable"><img src="/images/abouts/{{$about->about_image}}" width="200"></td>
                        <td width="250" class="sortable">
                            <video width="200" height="200" controls>
                                <source src="/images/abouts/{{$about->about_video}}" type="video/mp4">
                            </video>
                        </td>
                        <td  width="300" class="sortable">{{$about->about_title}}</td> <!-- NESNE OLARAK ÇEKME! -->
                        <td class="sortable">{{$about['about_content']}}</td>
                        <td width="5"><a href="{{route('about.Edit',$about->id)}}"><i class="fa fa-pencil-square"></i></a> </td>
                        <td width="5">
                            <a href="javascript:void(0)"><i id="@php echo $about->id @endphp" class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{$abouts->links()}}
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
                        url: "{{route('about.Sortable')}}",
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
                    location.href="/yonetim/hakkimizda/delete/"+destroy_id;
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
