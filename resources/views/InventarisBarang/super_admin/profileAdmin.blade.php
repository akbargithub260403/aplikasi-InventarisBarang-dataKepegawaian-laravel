@extends('layouts.master')

@section('judul','Profile Akun')
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
    <aside class="profile-nav alt">
        <section class="card">
            <div class="card-header user-header alt bg-dark">
                <div class="media">
                    <a href="#">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="/images/{{ Auth::user()->gambar }}">
                    </a>
                    <div class="media-body">
                        <h2 class="text-light display-6">{{$admin->name}}</h2>
                        <p>{{$admin->unit_kerja}}</p>
                    </div>
                </div>
            </div>


            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="#"> <i class="fa fa-envelope-o"></i> Mail<span class="pull-right">{{$admin->email}}</span></a>
                </li>
                <li class="list-group-item">
                    <a href="#"> <i class="fa fa-home"></i> Tempat , Tanggal Lahir <span class="pull-right">{{$admin->ttl}}</span></a>
                </li>
                <li class="list-group-item">
                    <a href="#"> <i class="fa fa-key"></i> Tipe Akun <span class="pull-right">{{$admin->role}}</span></a>
                </li>
                <li class="list-group-item">
                    <a href="#"> <i class="fa fa-user"></i> NIP <span class="pull-right r-activity">{{$admin->NIP}}</span></a>
                </li>
            </ul>

        </section>
    </aside>
    @if(auth()->user()->role == 'super_admin')
        <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#dataAkun{{$admin->id}}">
            Update Data Akun
        </button>
        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#gambar{{$admin->id}}">
            Update Profile Akun
        </button>
    @endif
</div>
<div class="modal fade" id="dataAkun{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Update Data Akun <i>{{$admin->name}}</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/update-akun/{{$admin->id}}/{{$admin->NIP}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nama</label>
                            <input type="text" name="name" value="{{$admin->name}}" class="form-control" id="inputPassword4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" value="{{$admin->email}}" class="form-control" id="inputEmail4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Tempat Tanggal Lahir</label>
                        <input type="text" name="ttl" value="{{$admin->ttl}}" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Unit Kerja</label>
                            <input type="text" name="unit_kerja" value="{{$admin->unit_kerja}}" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">NIP</label>
                            <input type="text" name="NIP" value="{{$admin->NIP}}" class="form-control" id="inputCity">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="gambar{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Update Profile Akun <i>{{$admin->name}}</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{'/update-gambar/akun/'.$admin->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <img src="{{asset('images/'.$admin->gambar)}}" class="rounded-circle" height="100px;" width="100px;" alt="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputAddress">Gambar Profile akun</label>
                        <input type="file" name="gambar" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
