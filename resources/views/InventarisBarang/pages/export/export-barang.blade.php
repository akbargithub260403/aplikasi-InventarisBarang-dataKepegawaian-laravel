<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Barang Inventaris ".$keterangan.".xls");
?>
 <center><i><h2>Data Barang Inventaris</h2></i></center>
        <table class="table table-hover table-dark" border="1">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Prodi</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Sumber Dana</th>
                <th scope="col">Harga Barang</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Tahun Peroleh</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Tanggal data Masuk</th>
                
                
                </tr>
            </thead>
        <tbody>
        @foreach ($data as $dt)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$dt->nama_prodi}}</td>
                <td>{{$dt->kode_barang}}</td>
                <td>{{$dt->nama_barang}}</td>
                <td>{{$dt->jenis_barang}}</td>
                <td>{{$dt->lokasi}}</td>
                <td>{{$dt->jumlah_barang}}</td>
                <td>{{$dt->sumber_dana}}</td>
                <td>{{$dt->harga_barang}}</td>
                <td>{{$dt->kondisi}}</td>
                <td>{{$dt->thn_peroleh}}</td>
                <td>{{$dt->keterangan}}</td>
                <td>{{$dt->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>