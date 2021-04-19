@extends('layouts.master')
@section('judul','Tambah data Pegawai')

@section('content')

<div class="col">
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data</strong> Pegawai
        </div>
        <div class="card-body card-block">
<form action="{{'/add-dataPegawai/store'}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nama</label>
      <input type="text" name="nama" class="form-control" autocomplete="off" id="inputEmail4" placeholder="Nama">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">NIP</label>
      <input type="text" name="nip" class="form-control"  autocomplete="off" id="inputPassword4" placeholder="NIP">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">GOL PANGKAT</label>
      <input type="text" name="gol_pangkat" class="form-control"  autocomplete="off" id="inputEmail4" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">TMT PANGKAT</label>
      <input type="text" name="tmt_pangkat" class="form-control" autocomplete="off" id="inputPassword4" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">NAMA JABATAN</label>
      <input type="text" name="nama_jabatan" class="form-control"  autocomplete="off" id="inputEmail4" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">TMT JABATAN</label>
      <input type="text" name="tmt_jabatan" class="form-control" autocomplete="off" id="inputPassword4">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">TH MASA KERJA</label>
      <input type="text" name="th_mk" class="form-control"  autocomplete="off" id="inputEmail4" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">BI MASA KERJA</label>
      <input type="text" name="bi_mk" class="form-control" autocomplete="off" id="inputPassword4">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Nama Latihan Jabatan</label>
      <input type="text" class="form-control" autocomplete="off" name="nama_latihan_jabatan" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">BL Latihan Jabatan</label>
      <input type="text" class="form-control" autocomplete="off" name="bl_latihan_jabatan">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Jml lthn Jabatan</label>
      <input type="text" name="jml_latihan_jabatan" autocomplete="off" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Nama Pendidikan</label>
      <input type="text" class="form-control" autocomplete="off" name="nama_pendidikan" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Lulus Pendidikan</label>
      <input type="text" class="form-control" autocomplete="off" name="lulus_pendidikan">
    </div>
  </div>
  <div class="form-row"><div class="form-group col-md-6">
    <label for="inputZip">Ijazah Pendidikan</label>
    <input type="text" name="ijazah_pendidikan" autocomplete="off" class="form-control" id="inputZip">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-8">
    <label for="inputZip">Tanggal Lahir</label>
    <input type="text" name="tanggal_lahir" autocomplete="off" class="form-control col-md-6" id="inputZip">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputEmail4">CATATAN MUTASI KEPEG</label>
    <input type="text" name="ct_mutasi_kepeg" autocomplete="off" class="form-control" id="inputEmail4" >
  </div>

  <div class="form-group col-md-4">
    <label for="inputPassword4">CATATAN KETERANGAN</label>
    <input type="text" name="ct_keterangan" autocomplete="off" class="form-control" id="inputPassword4">
  </div>
  <div class="form-group col-md-4">
    <label for="inputPassword4">Profile akun</label>
    <input type="file" name="gambar" autocomplete="off" class="form-control" id="inputPassword4">
  </div>
</div>

   <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
        <i class="fa fa-ban"></i> Reset
        </button>
    </div>
</form>
</div>
@endsection