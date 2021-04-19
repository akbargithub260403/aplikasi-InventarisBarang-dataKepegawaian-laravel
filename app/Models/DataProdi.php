<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProdi extends Model
{
    use HasFactory;
        protected $table    = 'dataprodi';

    protected $fillable     = ['nama_prodi','kode_barang','nama_barang','jenis_barang','lokasi','jumlah_barang','sumber_dana','harga_barang','kondisi','thn_peroleh','gambar','keterangan'];
}
