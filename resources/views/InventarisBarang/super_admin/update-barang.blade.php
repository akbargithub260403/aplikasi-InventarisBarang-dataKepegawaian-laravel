@extends('layouts.master')

@section('judul','Update Data Barang')
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
            <strong>Update Data</strong> Barang
        </div>
        <div class="card-body card-block">
        <form action="/update-barang/update/{{$barang->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        @method('patch')
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Barang </label></div>
                <div class="col-12 col-md-9">
                    <input type="number" value="{{$barang->kode_barang}}" name="kode_barang" id="text-input" placeholder="Nama" class="form-control @error ('kode_barang') is-invalid @enderror" autocomplete="off" role="alert">
                    @error('kode_barang')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Nama Barang</label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="email-input" value="{{$barang->nama_barang}}" name="nama_barang" placeholder="Nama Barang" class="form-control @error ('nama_barang') is-invalid @enderror" autocomplete="off">
                @error('nama_barang')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Barang</label></div>
                <div class="col-12 col-md-9">
                <input type="text" value="{{$barang->jenis_barang}}" readonly name="jenis_barang" id="text-input" placeholder="Nama" class="form-control @error ('jenis_barang') is-invalid @enderror" autocomplete="off" role="alert">
                    @error('jenis_barang')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Sumber Dana</label></div>
            <div class="col col-md-9">
               <input type="text" value="{{$barang->sumber_dana}}" readonly name="sumber_dana" id="text-input" placeholder="Nama" class="form-control @error ('sumber_dana') is-invalid @enderror" autocomplete="off" role="alert">
                    @error('sumber_dana')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
        </div>
        <hr>    
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Jumlah Barang</label></div>
            <div class="col-12 col-md-9">
            <input type="number" id="disabled-input" name="jumlah_barang" readonly value="{{$barang->jumlah_barang}}" placeholder="Jumlah Barang" class="form-control @error ('jumlah_barang') is-invalid @enderror" autocomplete="off">
            @error('jumlah_barang')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Lokasi Barang</label></div>
            <div class="col-12 col-md-9">
            <input type="text" id="disabled-input" name="lokasi" value="{{$barang->lokasi}}" placeholder="Lokasi Barang" class="form-control @error ('lokasi') is-invalid @enderror" autocomplete="off">
            @error('lokasi')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Harga Barang</label></div>
            <div class="col-12 col-md-9">
            <input type="text" id="disabled-input" name="harga_barang" value="{{$barang->harga_barang}}" placeholder="Harga Barang" class="form-control @error ('harga_barang') is-invalid @enderror" autocomplete="off">
            @error('harga_barang')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Kondisi Barang</label></div>
            <div class="col col-md-9">
                <input type="text" value="{{$barang->kondisi}}" name="kondisi" id="text-input" placeholder="Nama" class="form-control @error ('kondisi') is-invalid @enderror" autocomplete="off" role="alert">
                    @error('kondisi')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
        </div>
<hr>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Tahun Peroleh</label></div>
                <div class="col-12 col-md-9">
                <input type="number" value="{{$barang->thn_peroleh}}" readonly name="thn_peroleh" id="text-input" placeholder="Nama" class="form-control @error ('thn_peroleh') is-invalid @enderror" autocomplete="off" role="alert">
                    @error('thn_peroleh')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
        </div>
         <div class="row form-group">
            <div class="col col-md-3">
                <label for="textarea-input" class=" form-control-label">Keterangan</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" value="{{$barang->keterangan}}" name="keterangan" id="text-input" placeholder="Nama" class="form-control @error ('keterangan') is-invalid @enderror" autocomplete="off" role="alert">
                    @error('keterangan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
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
