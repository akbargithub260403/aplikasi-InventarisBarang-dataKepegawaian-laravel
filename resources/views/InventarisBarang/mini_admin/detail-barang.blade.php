@extends('layouts.master')

@section('judul','Detail Barang')
@section('content')
                    <div class="col">
@if (session('status'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
        <span class="badge badge-pill badge-primary">Success</span>
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
                        <section class="card">
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <i class="fa fa-openid"></i>
                                </div>
                                <div class="float-left">
                                    <img class="rounded-circle shadow mr-3" style="width:155px; height:155px;" alt="" src="/images/images-barang/{{$dataProdi->gambar}}">
                                </div>
                                <div class="media">
                                    <div class="media-body">
                                        <h2 class="text-white display-6">{{$dataProdi->nama_barang}}</h2>
                                        <p class="text-light">Kode: {{$dataProdi->kode_barang}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">
                                        <h5>{{$dataProdi->jumlah_barang}}</h5>
                                        Jumlah Barang
                                    </li>
                                    <li>
                                        <h5>Rp.{{$dataProdi->harga_barang}}</h5>
                                        Harga Barang
                                    </li>
                                    <li>
                                        <h5>{{$dataProdi->thn_peroleh}}</h5>
                                        Tahun Peroleh
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="twt-write col-sm-12">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"><i class="fa fa-envelope-o"></i> Jenis Barang : {{$dataProdi->jenis_barang}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"><i class="fa fa-tasks"></i> Sumber Dana : {{$dataProdi->sumber_dana}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-inbox"></i> Kondisi Barang : {{$dataProdi->kondisi}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-truck"></i> Lokasi Barang : {{$dataProdi->lokasi}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-comments-o"></i> Keterangan : {{$dataProdi->keterangan}}</a>
                                    </li>
                                    @foreach($prodi as $pr)
                                        <li class="list-group-item">
                                            <a href="#"> <i class="fa fa-comments-o"></i> Program Studi : {{$dataProdi->nama_prodi}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            @if(Auth()->user()->role == 'super_admin')
                            <footer class="ml-4">
                            <a href="/update-barang/{{$dataProdi->kode_barang}}/{{$dataProdi->id}}" class="btn btn-outline-warning mr-2"><i class="fa fa-exchange"></i>&nbsp; Update</a>

                            <button type="button" class="btn btn-outline-info mr-2" data-toggle="modal" data-target="#mediumModal">
                                <i class="fa fa-map-marker"></i>&nbsp; Kirimkan Data Barang
                            </button>

                                <form action="/delete-barang/{{$dataProdi->kode_barang}}/{{$dataProdi->id}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger"><i class="fa fa-trash"></i>&nbsp; Musnahkan Data Barang</button>
                                </form>
                            </footer>
                            @endif
                        </section>
                    </div>


                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                        <form action="/send-barang/{{$dataProdi->kode_barang}}/{{$dataProdi->id}}" method="post">
                        @csrf
                        <div class="row form-group">
                                        <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Nama Prodi</label></div>
                                        <div class="col-10 col-md-6">
                                            <select name="nama_prodi" id="select" class="form-control">
                                                <option value="TeknologiPendidikan">Teknologi Pendidikan</option>
                                                <option value="PerpustakaanDanSainsInformatika">Perpustakaan Dan Sains Informatika</option>
                                                <option value="AdministrasiPendidikan">Administrasi Pendidikan</option>
                                                <option value="PGSD">PGSD</option>
                                                <option value="PGPAUD">PGPAUD</option>
                                                <option value="PendidikanMasyarakat">Pendidikan Masyarakat</option>
                                                <option value="PendidikanKhusus">Pendidikan Khusus</option>
                                                <option value="PPB">PPB</option>
                                                <option value="Psikologi">Psikologi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
@endsection