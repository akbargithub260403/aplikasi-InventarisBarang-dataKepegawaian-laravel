<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data ".$keterangan." Inventaris.xls");
?>
 <center><i><h2>Data Admin Inventaris</h2></i></center>
        <table class="table table-hover table-dark" border="1">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Admin</th>
                <th scope="col">Email Admin</th>
                <th scope="col">Tempat , Tanggal Lahir</th>
                <th scope="col">Unit Kerja</th>
                <th scope="col">Tipe Akun</th>
                <th scope="col">Status Akun</th>
                <th scope="col">NIP</th>
                <th scope="col">Tanggal Pembuatan Akun</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($data as $dt)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$dt->name}}</td>
                <td>{{$dt->email}}</td>
                <td>{{$dt->ttl}}</td>
                <td>{{$dt->unit_kerja}}</td>
                <td>{{$dt->role}}</td>
                <td>{{$dt->status}}</td>
                <td>{{$dt->NIP}}</td>
                <td>{{$dt->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </table>