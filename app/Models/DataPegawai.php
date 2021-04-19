<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    use HasFactory;

    protected $table    = 'data_pegawai';

    protected $fillable     = ['nama','nip','gol_pangkat','tmt_pangkat','nama_jabatan','tmt_jabatan','th_mk','bi_mk','nama_latihan_jabatan','bl_latihan_jabatan','jml_latihan_jabatan','nama_pendidikan','lulus_pendidikan','ijazah_pendidikan','tanggal_lahir','ct_mutasi_kepeg','ct_keterangan','gambar'];

    
}
