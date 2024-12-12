<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['nama', 'jam', 'paket', 'nomorhp', 'tambahan_orang', 'tambahan_foto', 'tambahan_waktu'];
    // tampilkan data

}
