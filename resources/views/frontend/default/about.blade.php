@extends('frontend.layout')
@section('title',"Ana Sayfa Başlığı")
@section('content')

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Hakkımızda

        </h1>
 <!--
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Blog Home 2</li>
        </ol>
-->

        @foreach($datam['abouts'] as $abouts)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
{{--                        <a href="{{route('blog.Detail',$abouts->about_slug)}}">--}}
                            <!-- 750x300 -->
                            <img class="img-fluid rounded" src="/images/abouts/{{$abouts->about_image}}" alt="">
{{--                        </a>--}}
                    </div>

                    <div class="col-lg-4">
                        {{--                        <a href="{{route('blog.Detail',$abouts->about_slug)}}">--}}
                        <!-- 750x300 -->
                        <video width="300" height="300" controls>
                            <source src="/images/abouts/{{$abouts->about_video}}" type="video/mp4">
                        </video>
                        {{--                        </a>--}}
                    </div>

                    <div class="col-lg-4">
                        <h2 class="card-title">{{$abouts->about_title}}</h2>
                        <p class="card-text">{!! substr($abouts->about_content,0,300)!!}</p>
{{--                        <a href="{{route('blog.Detail',$abouts->blog_slug)}}" class="btn btn-primary">Devamını Oku &rarr;</a>--}}
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">

                @if(isset($abouts->created_at))

                   Yayınlama Zamanı {{$abouts->created_at->format('d-m-y h:i')}}

                @endif
            </div>
        </div>
        @endforeach


{{--         Pagination sayfalama
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>
--}}
    </div>


@endsection
@section('css') @endsection
@section('js') @endsection