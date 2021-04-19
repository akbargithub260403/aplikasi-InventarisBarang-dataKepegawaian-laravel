@extends('layouts.master')

@section('judul','Send Data Barang')
@section('content')

  @if (session('status'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
        <span class="badge badge-pill badge-primary">Success</span>
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif

<div class="col">
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data</strong> Barang
        </div>
        <div class="card-body card-block">
        <form action="/add-barang/store" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Barang </label></div>
                <div class="col-12 col-md-9">
                    <input type="number" value="{{$kode_barang}}" readonly name="kode_barang" id="text-input" placeholder="Nama" class="form-control @error ('kode_barang') is-invalid @enderror" autocomplete="off" role="alert">
                    @error('kode_barang')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Nama Barang</label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="email-input" name="nama_barang" placeholder="Nama Barang" class="form-control @error ('nama_barang') is-invalid @enderror" autocomplete="off">
                @error('nama_barang')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Barang</label></div>
                <div class="col-12 col-md-9">
                <select name="jenis_barang" id="select" class="form-control">
                <option value="ELEKTRONIK">ELEKTRONIK</option>
                <option value="NON-ELEKTRONIK">NON-ELEKTRONIK</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Sumber Dana</label></div>
            <div class="col col-md-9">
                <div class="form-check">
                    <div class="checkbox">
                        <label for="checkbox1" class="form-check-label ">
                            <input type="radio" id="checkbox1" name="sumber_dana" value="NON_PNBP" checked="checked" class="form-check-input">NON_PNBP
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="checkbox2" class="form-check-label ">
                            <input type="radio" id="checkbox2" name="sumber_dana" value="BPPTnbh" class="form-check-input"> BPPTnbh
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="checkbox3" class="form-check-label ">
                            <input type="radio" id="checkbox3" name="sumber_dana" value="KERJASAMA" class="form-check-input"> KERJASAMA
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="checkbox3" class="form-check-label ">
                            <input type="radio" id="checkbox3" name="sumber_dana" value="IGU" class="form-check-input"> IGU
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="checkbox3" class="form-check-label ">
                            <input type="radio" id="checkbox3" name="sumber_dana" value="INTEGRASI" class="form-check-input"> INTEGRASI
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <hr>    
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Jumlah Barang</label></div>
            <div class="col-12 col-md-9">
            <input type="number" id="disabled-input" name="jumlah_barang" placeholder="Jumlah Barang" class="form-control @error ('jumlah_barang') is-invalid @enderror" autocomplete="off">
            @error('jumlah_barang')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Lokasi Barang</label></div>
            <div class="col-12 col-md-9">
            <input type="text" id="disabled-input" name="lokasi" placeholder="Lokasi Barang" class="form-control @error ('lokasi') is-invalid @enderror" autocomplete="off">
            @error('lokasi')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Harga Barang</label></div>
            <div class="col-12 col-md-9">
            <input type="text" id="disabled-input" name="harga_barang" placeholder="Harga Barang" class="form-control @error ('harga_barang') is-invalid @enderror" autocomplete="off">
            @error('harga_barang')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Kondisi Barang</label></div>
            <div class="col col-md-9">
                <div class="form-check-inline form-check">
                    <label for="inline-radio1" class="form-check-label ">
                        <input type="radio" id="inline-radio1" name="kondisi" value="Baik" checked="checked" class="form-check-input">Baik
                    </label>
                    <label for="inline-radio2" class="form-check-label ">
                        <input type="radio" id="inline-radio2" name="kondisi" value="Sedang" class="form-check-input">Rusak Sedang
                    </label>
                    <label for="inline-radio3" class="form-check-label ">
                        <input type="radio" id="inline-radio3" name="kondisi" value="Berat" class="form-check-input">Rusak Berat
                    </label>
                </div>
            </div>
        </div>
<hr>
       
         <div class="row form-group">
            <div class="col col-md-3">
                <label for="textarea-input" class=" form-control-label">Keterangan</label>
            </div>
            <div class="col-12 col-md-9">
                <textarea name="keterangan" id="textarea-input" rows="5" placeholder="Keterangan..." class="form-control"></textarea>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Gambar</label></div>
                <div class="col-12 col-md-9">
                <input type="file" id="file-input" name="gambar" class="form-control-file @error ('gambar') is-invalid @enderror">
                @error('gambar')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
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
