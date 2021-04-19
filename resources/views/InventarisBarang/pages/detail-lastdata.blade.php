@extends('layouts.master')

@section('judul','Detail Barang')
@section('content')
                    <div class="col">
                        <section class="card">
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <i class="fa fa-openid"></i>
                                </div>
                                <div class="float-left">
                                    <img class="rounded-circle shadow mr-3" style="width:155px; height:155px;" alt="" src="/images/images-barang/{{$lastData->gambar}}">
                                </div>
                                <div class="media">
                                    <div class="media-body">
                                        <h2 class="text-white display-6">{{$lastData->nama_barang}}</h2>
                                        <p class="text-light">Kode: {{$lastData->kode_barang}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h5>{{$lastData->jumlah_barang}}</h5>
                                        Jumlah Barang
                                    </li>
                                    <li>
                                        <h5>Rp.{{$lastData->harga_barang}}</h5>
                                        Harga Barang
                                    </li>
                                    <li>
                                        <h5>{{$lastData->thn_peroleh}}</h5>
                                        Tahun Peroleh
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="twt-write col-sm-12">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"><i class="fa fa-envelope-o"></i> Jenis Barang : {{$lastData->jenis_barang}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"><i class="fa fa-tasks"></i> Sumber Dana : {{$lastData->sumber_dana}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-inbox"></i> Kondisi Barang : {{$lastData->kondisi}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-truck"></i> Lokasi Barang : {{$lastData->lokasi}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-comments-o"></i> Keterangan : {{$lastData->keterangan}}</a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            @if(Auth()->user()->role == 'super_admin')
                            <footer class="ml-4">
                                <form action="/back-lastData/{{$lastData->kode_barang}}/{{$lastData->id}}" method="post" class="d-inline">
                                    @csrf
                                    <button class="btn btn-outline-info"><i class="fa fa-external-link-square"></i>&nbsp; Kembalikan Data Barang</button>
                                </form>

                                <form action="/delete-lastData/{{$lastData->kode_barang}}/{{$lastData->id}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger"><i class="fa fa-trash"></i>&nbsp; Hapus Data Barang</button>
                                </form>
                            </footer>
                            @endif
                        </section>
                    </div>
@endsection