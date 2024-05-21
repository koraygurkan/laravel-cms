@extends('frontend.layout')
@section('title',"Ana Sayfa Başlığı")
@section('content')

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Blog
            <small>Blog Listesi</small>
        </h1>
 <!--
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Blog Home 2</li>
        </ol>
-->

        @foreach($data['blog'] as $blog)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('blog.Detail',$blog->blog_slug)}}">
                            <!-- 750x300 -->
                            <img class="img-fluid rounded" src="/images/blogs/{{$blog->blog_file}}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="card-title">{{$blog->blog_title}}</h2>
                        <p class="card-text">{!! substr($blog->blog_content,0,300)!!}</p>
                        <a href="{{route('blog.Detail',$blog->blog_slug)}}" class="btn btn-primary">Devamını Oku &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                Yayınlama Zamanı {{$blog->created_at->format('d-m-y h:i')}}
            </div>
        </div>
        @endforeach


        <!-- Pagination sayfalama
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>
        -->
    </div>


@endsection
@section('css') @endsection
@section('js') @endsection