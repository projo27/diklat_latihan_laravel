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
        <li class="breadcrumb-item active">Edit</li>
      </ol>

      <h1>Edit Data Siswa</h1>

        <form action="{{url('siswa/'.$siswa->id)}}" method="POST" class="form-horizontal">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" class="form-control" value="{{ $siswa->id}}">
        <div class="form-body">
            <div class="form-group">
                <label for="nisn" class="control-label">NISN
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $siswa->nisn }}" />
                    @if ($errors->has('nisn'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('nisn')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="control-label">Nama
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}" />
                    @if ($errors->has('nama'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('nama')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="tempat_lahir" class="control-label">Tempat Lahir
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ $siswa->tempat_lahir }}" />
                    @if ($errors->has('tempat_lahir'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('tempat_lahir')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir" class="control-label">Tanggal Lahir
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <input name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}" />
                    @if ($errors->has('tanggal_lahir'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('tanggal_lahir')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin" class="control-label">Jenis Kelamin
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="L" @if ($siswa->jenis_kelamin == "L")
                            selected
                        @endif >Laki-Laki</option>
                        <option value="P"@if ($siswa->jenis_kelamin == "P")
                                selected
                            @endif >Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="no_telepon" class="control-label">No Telepon
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ $siswa->no_telepon }}" />
                    @if ($errors->has('no_telepon'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('no_telepon')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <select name="id_kelas" id="id_kelas" class="form-control">
                    @foreach ($list_kelas as $kelas)
                        <option value="{{ $kelas->id }}" @if ($siswa->id_kelas == $kelas->id)
                            selected='sleected'
                        @endif >{{ $kelas->nama_kelas }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_kelas'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('id_kelas')}}
                    </div>
                @endif
            </div>
        </div>
        <br />
        <button type="submit" class="btn btn-primary">Submit</button>
    
        </form>
@stop

@section('footer')