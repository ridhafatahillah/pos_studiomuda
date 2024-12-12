<?php

namespace App\Http\Controllers;

use App\Models\bayar;
use Illuminate\Http\Request;

class pelanggan extends Controller
{
    public function index()
    {
        $data = bayar::all();
        $total = 0;
        foreach ($data as $row) {
            $total += $row['harga'];
        }

        $jumlah = count($data);

        return view('pelanggan', ['title' => 'Master'], compact('data', 'total', 'jumlah'));
    }
}
