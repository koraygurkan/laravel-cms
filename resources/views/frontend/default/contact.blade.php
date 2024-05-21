@extends('frontend.layout')
@section('title',"İletişim")
@section('content')
  <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Bize Ulaşın</h1>
      <HR>
<!--
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <a href="index.html">Home</a>
          </li>
          <li class="breadcrumb-item active">Contact</li>
      </ol>
!-->

      @if (session()->has('success'))
          <div class="alert alert-success">
            <p>{{session('success')}}</p>
          </div>
      @endif


  @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <!-- Content Row -->
      <div class="row">
          <!-- Map Column -->
          <div class="col-lg-8 mb-4">
              <h3>İletişim Formu</h3>
              <form method="POST" action={{route('sendPost')}} enctype="multipart/form-data">
                  @CSRF
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Ad Soyad:</label>
                          <input type="text" class="form-control" name="contact_ad">
                          <p class="help-block"></p>
                      </div>
                  </div>

                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Tel No:</label>
                          <input type="tel" class="form-control" name="contact_phone">
                          <p class="help-block"></p>
                      </div>
                  </div>

                  <div class="control-group form-group">
                      <div class="controls">
                          <label>E-mail Adres:</label>
                          <input type="email" class="form-control" name="contact_email">
                          <p class="help-block"></p>
                      </div>
                  </div>


                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Mesaj:</label>
                          <textarea rows="10" cols="100" class="form-control" name="contact_mesaj"></textarea>
                          <div class="help-block"></div></div>
                  </div>
                  <div id="success"></div>
                  <!-- For success/fail messages -->
                  <button type="submit" class="btn btn-primary">Gönder</button>
              </form>
          </div>

          <!-- Contact Details Column -->
          <div class="col-lg-4 mb-4">
              <h3>Adres Detayları</h3>
              <p>
                    {!! $adres !!}
                  <br>{{$ilce}} / {{$il}}
                  <br>{{$phone_gsm}}
                  <br> {{$phone_sabit}}
                  <br><a href="mailto:{{$mail}}">{{$mail}}</a>
              </p>

          </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <!-- /.row -->

  </div>

@endsection
@section('css') @endsection
@section('js') @endsection