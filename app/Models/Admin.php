<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table        = 'users';

    protected $fillable     = ['name','email','ttl','unit_kerja','role','status','NIP','gambar','password'];
}
