@extends('template.index')

@section('main')
    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url ('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Siswa</li>
      </ol>
      <h1>Data Siswa</h1>
      <p><strong>Jumlah Siswa : {{$jml_siswa}}</strong></p>
      <a href="{{url('siswa/create')}}" class="btn btn-success">Tambah Siswa</a>
      {{-- <hr>
      @if (!empty($siswa))
          <ul>
              @foreach ($siswa as $anak)
                  <li>{{$anak}}</li>
              @endforeach
          </ul>
      @else
          <p>Data Siswa Tidak ditemukan</p>
      @endif --}}
      <div class="card-header">
          <i class="fa fa-table"></i> Daftar Siswa
      </div>
      <div class="card-body">
          @if (!empty($siswa))
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tgl Lahir</th>
                            <th>Jenis kelamin</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $murid)
                         <tr>
                             <td>{{$murid->id}}</td>
                             <td>{{$murid->nisn}}</td>
                             <td>{{$murid->nama}}</td>
                             <td>{{$murid->tanggal_lahir}}</td>
                             <td>{{$murid->jenis_kelamin}}</td>
                             <form action="{{url('siswa/'.$murid->id)}}" method="post">
                             <td>
                                 <a href="{{ url('siswa/'.$murid->id)}}">
                                    <button type="button" class="btn btn-circle btn-primary">Detail</button>
                                 </a>
                                 <a href="{{ url('siswa/'.$murid->id.'/edit')}}">
                                    <button type="button" class="btn btn-circle btn-warning">Edit</button>
                                 </a>
                                 {{csrf_field()}}
                                 <button type="submit" name="_method" value="delete" class="btn btn-circle btn-danger">Delete</button>
                             </td>
                            </form>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          @else
              
          @endif
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  </div>
@stop

@section('footer')