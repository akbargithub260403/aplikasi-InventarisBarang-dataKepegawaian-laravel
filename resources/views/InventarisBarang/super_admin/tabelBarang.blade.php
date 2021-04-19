@extends('layouts.master')

@section('judul','Tabel Data Barang')
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

<form action="/search-barang" method="post" class="mb-2">
    @csrf
    <input type="text" class="form-control col-md-6 d-inline" name="search" autocomplete="off" placeholder="Search Engine">
    <Button type="submit" class="btn btn-outline-info btn-md">Search</Button>
</form>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Kode-barang</th>
            <th>Nama-Barang</th>
            <th>Sumber-Dana</th>
            <th>Kondisi</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $dt)
        <tr>
            <td>{{$dt->kode_barang}}</td>
            <td>{{$dt->nama_barang}}</td>
            <td>{{$dt->sumber_dana}}</td>
            <td>
                @if( $dt->kondisi == 'Baik')
                    <button class="btn btn-info">{{$dt->kondisi}}</button>
                @elseif( $dt->kondisi == 'Sedang')
                    <button class="btn btn-warning">{{$dt->kondisi}}</button>
                @elseif( $dt->kondisi == 'Berat')
                    <button class="btn btn-danger">{{$dt->kondisi}}</button>
                @endif
            </td>
            <td>
                <a href="/detail-barang/{{$dt->nama_barang}}/{{$dt->id}}" class="badge badge-success">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
