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
        <li class="breadcrumb-item active">Create</li>
      </ol>

      <h1>Tambah Data Siswa</h1>

        <form action="{{url('siswa')}}" method="post" class="form-horizontal">
        {{csrf_field()}}
        <div class="form-body">
            <div class="form-group">
                <label for="nisn" class="control-label">NISN
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <input type="text" name="nisn" id="nisn" class="form-control" />
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
                    <input type="text" name="nama" id="nama" class="form-control" />
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
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" />
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
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" />
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
                        <option value="">Pilih..</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="no_telepon" class="control-label">No Telp
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <input name="no_telepon" id="no_telepon" class="form-control" />
                    @if ($errors->has('no_telepon'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('no_telepon')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="id_kelas" class="control-label">Kelas
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    <select name="id_kelas" id="id_kelas" class="form-control">
                        @foreach ($list_kelas as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('id_kelas'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('id_kelas')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="hobi" class="control-label">Hobi
                    <span class="required">*</span>
                </label>
                <div class="col-md-4">
                    @foreach ($list_hobi as $hob)
                        <label for=""><input type="checkbox" name="hobi[]"  value="{{ $hob->id }}">{{ $hob->nama_hobi }}</label><br />
                    @endforeach
                    @if ($errors->has('hobi'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('hobi')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    
        </form>
@stop

@section('footer')