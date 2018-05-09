@extends('template.index')

@section('main')
    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url ('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ url ('siswa') }}">Siswa</a>
        </li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
      <h1>Data Siswa</h1>
      
      <div class="card-header">
          <i class="fa fa-table"></i> Detail Siswa (<strong>{{$siswa->nama}} {{$siswa->nama_akhir}}</strong>)
      </div>
      <div class="card-body">
        <form action="{{url('siswa')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="nisn">NISN *</label>
                <input type="text" class="form-control" name="nisn" id="nisn" placeholder="NISN" value="{{$siswa->nisn}}">
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <label for="nama">NAMA *</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="{{$siswa->nama}}">
                </div>
                <div class="col-6">
                    <label for="nama_akhir">NAMA AKHIR *</label>
                    <input type="text" class="form-control" name="nama_akhir" id="nama_akhir" placeholder="Nama Akhir" value="{{$siswa->nama_akhir}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <label for="tempat_lahir">Tempat *</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="{{$siswa->tempat_lahir}}">
                </div>
                <div class="col-6">
                    <label for="tgl_lahir">Tgl Lahir *</label>
                    <input type="text" class="form-control" name="tanggal_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="{{$siswa->tanggal_lahir}}">
                </div>
            </div>
            <div class="form-group">
                <label for="jns_kelamin"> Jns Kelamin*</label>
                <input type="text" class="form-control" name="jenis_kelamin" id="jns_kelamin" placeholder="NISN" value="{{$siswa->jenis_kelamin}}">
            </div>
            <div class="form-group">
                <label for="no_telepon"> No Telp</label>
                <input type="text" disabled class="form-control" name="no_telepon" id="no_telepon" placeholder="NO Telp" value="{{ !empty($murid->telepon->no_telepon) ? $anak->telepon->no_telepon : '-' }}">
            </div>
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        </form>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  </div>
@stop

@section('footer')