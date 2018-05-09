@extends('template.index')

@section('main')
    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url ('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>
      <h1>Selamat Datang</h1>
      <hr>
      <p>Halaman About</p>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  </div>
@stop

@section('footer')