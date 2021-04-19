@extends('layouts.master')

@section('judul','Tabel Data Toko')
@section('content')

    @if (session('status'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
<button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#mediumModal">
    <i class="fa fa-truck"></i>&nbsp; Tambah data Toko
</button>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nama-Toko</th>
            <th>Tanggal-Pembelian</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $dt)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dt->nama_toko}}</td>
            <td>{{$dt->tanggal_pembelian}}</td>
            <td>
                <a href="/detail-toko/{{$dt->nama_toko}}/{{$dt->id}}" class="badge badge-success">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Tambah Data Toko</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/add-datatoko" method="post">
                                    @csrf
                                    <div class="col">
                                    <label for="">Nama Toko</label>
                                    <input type="text" name="nama_toko" class="form-control col-md-8" placeholder="nama toko" autocomplete="off">
                                    </div>
                                    <div class="col">
                                    <label for="">Tanggal Pembelian</label>
                                    <input type="text" name="tanggal_pembelian" class="form-control col-md-6" placeholder="Tanggal Pembelian" autocomplete="off">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


@endsection
