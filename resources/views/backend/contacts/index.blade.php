@extends('backend.layout')
@section('content')
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
                        <th scope="col">Email</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Mesaj</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($data['contact'] as $contacts)
                        <tr id="item-{{$contacts->id}}">
                            <th scope="row">{{$contacts->id}}</th> <!-- BU DİZİ OLARAK ÇEKME ALTTAKİ NESNE OLARAK ÇEKMEDİR-->
                            <td class="sortable">{{$contacts->contact_ad}}</td> <!-- NESNE OLARAK ÇEKME! -->
                            <td>
                                {{$contacts->contact_email}}
                            </td>

                            <td>{{$contacts->contact_phone}}</td>
                            <td>{{$contacts->contact_mesaj}}</td>

                            <td width="5">
{{--                             <a href="{{route('contactDelete',['id'=>$contacts->id])}}"><i id="@php echo $contacts->id @endphp" class="fa fa-trash-o"></i></a>--}}
                                <a href="javascript:void(0)"><i id="@php echo $contacts->id @endphp" class="fa fa-trash-o"></i></a>

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
                        url: "{{route('contact.Sortable')}}",
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

@endsection
@section('css')@endsection
@section('js')@endsection
