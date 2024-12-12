<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['nama', 'haritanggal', 'jam', 'paket', 'nomorhp', 'tambahan_orang', 'tambahan_foto', 'tambahan_waktu'];
    // redirect to home

}
