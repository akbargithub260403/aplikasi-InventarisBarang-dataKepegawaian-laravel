<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table    = 'data_barang';

    protected $fillable = ['nama_prodi','kode_barang','nama_barang','jenis_barang','lokasi','jumlah_barang','sumber_dana','harga_barang','kondisi','thn_peroleh','gambar','keterangan'];
}
