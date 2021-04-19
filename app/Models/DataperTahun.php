<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataperTahun extends Model
{
    use HasFactory;

    protected $table        = 'datapertahun';

    protected $fillable     = ['NON_PNBP','BPPTnbh','KERJASAMA','IGU','INTEGRASI','jumlah_total'];
}
