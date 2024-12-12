<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bayar extends Model
{
    use HasFactory;
    protected $table = 'rekap';
    protected $fillable = ['nama', 'haritanggal', 'jam', 'paket', 'tambahan_orang', 'tambahan_foto', 'tambahan_waktu', 'harga', 'pembayaran'];
    // tampilkan data

}
