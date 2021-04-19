@extends('layouts.master')

@section('judul','Export data')
@section('content')

 <div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h4>Halaman Export Excel</h4>
        </div>
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-barang-tab" data-toggle="tab" href="#custom-nav-barang" role="tab" aria-controls="custom-nav-barang" aria-selected="true">Data Barang</a>

                        <a class="nav-item nav-link" id="custom-nav-toko-tab" data-toggle="tab" href="#custom-nav-toko" role="tab" aria-controls="custom-nav-toko" aria-selected="false">Data Toko</a>
                        <a class="nav-item nav-link" id="custom-nav-admin-tab" data-toggle="tab" href="#custom-nav-admin" role="tab" aria-controls="custom-nav-admin" aria-selected="false">Data Admin</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="custom-nav-barang" role="tabpanel" aria-labelledby="custom-nav-barang-tab">
                        <p>Semua data barang di Export dalam bentuk excel.</p>
                        <div class="card-body text-white">
                            <a href="/export-data-barang/{{'all_barang'}}" class="btn btn-outline-success btn-lg btn-block">Semua Data Barang</a>
                            <a href="/export-data-barang/{{'elektronik'}}" class="btn btn-outline-success btn-lg btn-block">Elektronik</a>
                            <a href="/export-data-barang/{{'non-elektronik'}}" class="btn btn-outline-success btn-lg btn-block">Non-Elektronik</a>
                            <a href="/export-data-barang/kondisi/{{'Baik'}}" class="btn btn-outline-success btn-lg btn-block">Kondisi-Baik</a>
                            <a href="/export-data-barang/kondisi/{{'Sedang'}}" class="btn btn-outline-success btn-lg btn-block">Kondisi-Ringan</a>
                            <a href="/export-data-barang/kondisi/{{'Berat'}}" class="btn btn-outline-success btn-lg btn-block">Kondisi-Berat</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-toko" role="tabpanel" aria-labelledby="custom-nav-toko-tab">
                        <p>Semua data Toko di Export dalam bentuk Excel.</p>
                        <div class="card-body text-white">
                            <a href="/export-data/data/{{'toko'}}" class="btn btn-outline-success btn-lg btn-block">Semua Data Toko</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-admin" role="tabpanel" aria-labelledby="custom-nav-admin-tab">
                        <p>Semua data Admin di Export dalam bentuk Excel.</p>
                        <div class="card-body text-white">
                            <a href="/export-data/data/{{'admin'}}" class="btn btn-outline-success btn-lg btn-block">Semua Data Admin</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


 <div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h4>Halaman Export Pdf</h4>
        </div>
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-barangpdf-tab" data-toggle="tab" href="#custom-nav-barangpdf" role="tab" aria-controls="custom-nav-barangpdf" aria-selected="true">Data barangpdf</a>

                        <a class="nav-item nav-link" id="custom-nav-tokopdf-tab" data-toggle="tab" href="#custom-nav-tokopdf" role="tab" aria-controls="custom-nav-tokopdf" aria-selected="false">Data tokopdf</a>
                        <a class="nav-item nav-link" id="custom-nav-adminpdf-tab" data-toggle="tab" href="#custom-nav-adminpdf" role="tab" aria-controls="custom-nav-adminpdf" aria-selected="false">Data Admin</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="custom-nav-barangpdf" role="tabpanel" aria-labelledby="custom-nav-barangpdf-tab">
                        <p>Semua data barang di Export dalam bentuk Pdf.</p>
                        <div class="card-body text-white">
                            <a href="/export-data-barang/pdf/{{'all_barang'}}" target="_blank" class="btn btn-outline-danger btn-lg btn-block">Semua Data Barang</a>
                            <a href="/export-data-barang/pdf/{{'elektronik'}}" target="_blank" class="btn btn-outline-danger btn-lg btn-block">Elektronik</a>
                            <a href="/export-data-barang/pdf/{{'non-elektronik'}}" target="_blank" class="btn btn-outline-danger btn-lg btn-block">Non-Elektronik</a>
                            <a href="/export-data-barang/pdf/{{'Baik'}}" class="btn btn-outline-danger btn-lg btn-block">Kondisi-Baik</a>
                            <a href="/export-data-barang/pdf/{{'Sedang'}}" class="btn btn-outline-danger btn-lg btn-block">Kondisi-Ringan</a>
                            <a href="/export-data-barang/pdf/{{'Berat'}}" class="btn btn-outline-danger btn-lg btn-block">Kondisi-Berat</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-tokopdf" role="tabpanel" aria-labelledby="custom-nav-tokopdf-tab">
                        <p>Semua data Toko di Export dalam bentuk Pdf.</p>
                        <div class="card-body text-white">
                            <a href="/export-data-barang/pdf/{{'toko'}}" class="btn btn-outline-danger btn-lg btn-block">Semua Data Toko</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-adminpdf" role="tabpanel" aria-labelledby="custom-nav-adminpdf-tab">
                        <p>Semua data Admin di Export dalam bentuk Pdf.</p>
                        <div class="card-body text-white">
                            <a href="/export-data-barang/pdf/{{'admin'}}" class="btn btn-outline-danger btn-lg btn-block">Semua Data Admin</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection