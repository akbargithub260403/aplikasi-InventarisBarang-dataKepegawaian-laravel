<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataToko extends Model
{
    use HasFactory;

    protected $table    = 'data_toko';

    protected $fillable     = ['nama_toko','tanggal_pembelian'];
}
