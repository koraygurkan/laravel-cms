@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Blog Ekleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="blog_file" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_title">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>SEO Url - Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="blog_slug">
                            </div>
                        </div>
                    </div>

                            <div class="form-group">
                                <label>İçerik</label>
                                <div class="row">
                                    <div class="col-xs-12">

                                           <textarea class="form-control" id="editor1" name="blog_content"></textarea>

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

                                <select name="blog_status" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>

                                    </div>
                                </div>

                                <div align="right" class="box-footer">
                                    <button class="btn btn-success" type="submit">Ekle</button>
                                </div>
                            </div>

                </form>
            </div>
        </div>

    </section>



@endsection
@section('css')@endsection
@section('js')@endsection
