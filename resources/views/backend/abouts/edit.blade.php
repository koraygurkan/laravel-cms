@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Hakkımızda Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('about.Update',$abouts->id)}}" method="post" enctype="multipart/form-data">
                    @csrf


                @isset($abouts->about_image)
                    <div class="form-group">
                        <label>Yüklü Görsel</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="/images/abouts/{{$abouts->about_image}}" width="200">
                            </div>
                        </div>
                    </div>
               @endisset

                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="about_image" >
                            </div>
                        </div>
                    </div>

                        @isset($abouts->about_video)
                            <div class="form-group">
                                <label>Yüklü Video</label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <video width="400px" height="200px" controls>
                                            <source src="/images/abouts/{{$abouts->about_video}}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        @endisset

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
                                <input class="form-control" type="text" name="about_title" value="{{$abouts->about_title}}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>SEO Url - Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="about_slug" value="{{$abouts->about_slug}}">
                            </div>
                        </div>
                    </div>

                            <div class="form-group">
                                <label>İçerik</label>
                                <div class="row">
                                    <div class="col-xs-12">

                                           <textarea class="form-control" id="editor1" name="about_content">{{$abouts->about_content}}</textarea>

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
                                    <option {{$abouts->about_status=="1" ? "selected=''" : ""}} value="1">Aktif</option>
                                    <option {{$abouts->about_status=="0" ? "selected=''" : ""}} value="0">Pasif</option>
                                </select>

                                    </div>
                                </div>

                                <input type="hidden" name="old_image" value="{{$abouts->about_image}}">
                                <input type="hidden" name="old_video" value="{{$abouts->about_video}}">


                                <div align="right" class="box-footer">
                                    <button class="btn btn-success" type="submit">Düzenle</button>
                                </div>
                            </div>

                </form>
            </div>
        </div>

    </section>



@endsection
@section('css')@endsection
@section('js')@endsection
