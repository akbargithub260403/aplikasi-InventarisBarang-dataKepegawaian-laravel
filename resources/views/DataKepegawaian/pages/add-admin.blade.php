@extends('layouts.master')

@section('judul','Tambah Akun Admin')
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
            <strong>Tambah Akun</strong> Admin
        </div>
        <div class="card-body card-block">
        <form action="{{'/add-akun/adminKepegawaian/register'}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama </label></div>
                <div class="col-12 col-md-9">
                    <input type="text" name="name" id="text-input" autocomplete="off" placeholder="Nama" class="form-control @error ('name') is-invalid @enderror" role="alert">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
            <div class="col-12 col-md-9">
                <input type="email" id="email-input" name="email" placeholder="Enter Email" class="form-control @error ('email') is-invalid @enderror">
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                <div class="col-12 col-md-9">
                <input type="password" id="password-input" name="password" placeholder="Password" class="form-control @error ('email') is-invalid @enderror">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
        <hr>    
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Tempat / Tanggal lahir</label></div>
            <div class="col-12 col-md-9">
            <input type="text" id="disabled-input" name="ttl" placeholder="Tempat / Tanggal lahir" class="form-control @error ('ttl') is-invalid @enderror">
            @error('ttl')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Unit Kerja</label></div>
            <div class="col-12 col-md-9">
            <input type="text" id="disabled-input" name="unit_kerja" placeholder="Unit Kerja" class="form-control @error ('unit_kerja') is-invalid @enderror">
            @error('unit_kerja')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">NIP</label></div>
            <div class="col-12 col-md-9">
            <input type="number" id="disabled-input" name="NIP" placeholder="NIP" class="form-control @error ('NIP') is-invalid @enderror">
            @error('NIP')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
            <label for="file-input" class=" form-control-label">Gambar</label></div>
                <div class="col-12 col-md-9">
                <input type="file" id="file-input" name="gambar" class="form-control-file @error ('gambar') is-invalid @enderror">
                @error('gambar')
                <small class="text-danger">{{ $message }}</small>
                @enderror
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
