@extends('frontend.layout')
@section('title',"Ana Sayfa")
@section('content')
    <h1 style="display: none">{{$title}}</h1>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <!-- Çizgiler !-->
        @php($counts=0)
        <ol class="carousel-indicators">
            @for($i=0; $i<=count($data['slider'])-1; $i++ )
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="@if($counts++==0) active @endif"></li>
            @endfor
        </ol>

        <div class="carousel-inner" role="listbox">
            @php($count=0)
            @foreach($data['slider'] as $sliders)
                <div class="carousel-item @if($count++==0) active @endif" style="background-image: url('/images/sliders/{{$sliders->slider_file}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="@if (strlen($sliders->slider_url)>0){{$sliders->slider_url}}@else javascript:void(0)" @endif" target="_blank">
                            <h3>{{$sliders->slider_title}}</h3>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<!-- Page Content -->
<div class="container">

    <!-- Portfolio Section -->
    <p><h2>Blog</h2></p>

    <div class="row">
        @foreach($data['blog'] as $blog)
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="{{route('blog.Detail',$blog->blog_slug)}}"><img class="card-img-top" src="/images/blogs/{{$blog->blog_file}}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{route('blog.Detail',$blog->blog_slug)}}">{{$blog->blog_title}}</a>
                        </h4>
                        <p class="card-text">{!! substr($blog->blog_content,0,160)!!}...</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-6">
            <h2>{{$home_title}}</h2>
            {!! $home_detail !!}

        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded" src="/images/settings/{{$home_image}}" alt="">
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
        <div class="col-md-8">
       
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="{{route('contact.Detail')}}">Bize Ulaşın</a>
        </div>
    </div>

</div>
<!-- /.container -->
@endsection
@section('css') @endsection
@section('js') @endsection