<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapelanggan extends Model
{
    use HasFactory;
    protected $table = 'datapelanggan';
    protected $primaryKey = 'id_booking';
    public $incrementing = false;
}
