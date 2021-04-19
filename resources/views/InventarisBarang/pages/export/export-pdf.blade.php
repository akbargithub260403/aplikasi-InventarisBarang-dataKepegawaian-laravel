<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Pdf</title>

    <style>
        body{
            font-size:12px;
        }
        table{
            margin-left:0px;
            position:absolute;
            left:-40px;

        }
    </style>

</head>
<body>

<center><i><h2>Data Barang Inventaris</h2></i></center>
        <table border="1">
            <thead>
                <tr>
                <th>#</th>
                <th>Nama Prodi</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Lokasi</th>
                <th>Jumlah Barang</th>
                <th>Sumber Dana</th>
                <th>Harga Barang</th>
                <th>Kondisi</th>
                <th>Tahun Peroleh</th>
                <th>Keterangan</th>
                <th>Tanggal data Masuk</th>
                
                
                </tr>
            </thead>
        <tbody>
        @foreach ($data as $dt)
            <tr>
                <th>{{$loop->iteration}}</th>
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
    
</body>
</html>