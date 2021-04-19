<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data ".$keterangan." Inventaris.xls");
?>
 <center><i><h2>Data Toko</h2></i></center>
        <table class="table table-hover table-dark" border="1">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Toko</th>
                <th scope="col">Tanggal Pembelian</th>
                
                
                </tr>
            </thead>
        <tbody>
        @foreach ($data as $dt)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$dt->nama_toko}}</td>
                <td>{{$dt->tanggal_pembelian}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </table>