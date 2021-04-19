<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersAdmin extends Model
{
    use HasFactory;
    protected $table    = 'usersadmin';

    protected $fillable     = ['name','email','ttl','unit_kerja','nip','password'];
}
