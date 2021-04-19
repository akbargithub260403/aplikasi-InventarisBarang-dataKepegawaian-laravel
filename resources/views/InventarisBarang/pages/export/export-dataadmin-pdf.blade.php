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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Unit Kerja</th>
                    <th>Tipe Akun</th>
                    <th>Nama Prodi</th>
                    <th>NIP</th>
                    <th>Avatar</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($data as $dt)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$dt->name}}</td>
                <td>{{$dt->email}}</td>
                <td>{{$dt->ttl}}</td>
                <td>{{$dt->unit_kerja}}</td>
                <td>{{$dt->role}}</td>
                <td>{{$dt->status}}</td>
                <td>{{$dt->NIP}}</td>
                <td><center><img src="{{ public_path('images/'.$dt->gambar) }}" style="border-radius: 100%;" width="50px;" height="50px;" alt=""></center></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</body>
</html>