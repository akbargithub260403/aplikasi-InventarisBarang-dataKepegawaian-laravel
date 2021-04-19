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
    </style>

</head>
<body>

<center><i><h2>Data Toko Inventaris</h2></i></center>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Toko</th>
                    <th>Tanggal Pembelian</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($data as $dt)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$dt->nama_toko}}</td>
                <td>{{$dt->tanggal_pembelian}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</body>
</html>