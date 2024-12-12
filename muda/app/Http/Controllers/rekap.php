<?php

namespace App\Http\Controllers;

use App\Models\bayar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class rekap extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('tanggal')) {
            $tanggal = $request->tanggal;
            $bulan = date('Y-m', strtotime($tanggal));
            $minggu = Carbon::createFromFormat('Y-m-d', $tanggal)->weekOfYear;
        } else {
            $tanggal = date('Y-m-d');
            $bulan = date('Y-m');
            $minggu = date('W');
        }

        $datamingguawal = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfWeek();
        $datamingguakhir = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfWeek();

        $data = bayar::where('haritanggal', $tanggal)->get();
        $databulanini = bayar::where('haritanggal', 'like', $bulan . '%')->get();
        $datamingguini = bayar::whereBetween('haritanggal', [$datamingguawal, $datamingguakhir])->get();
        $totalbulanini = 0;
        foreach ($databulanini as $row) {
            $totalbulanini += $row['harga'];
        }

        $totalmingguini = 0;
        foreach ($datamingguini as $row) {
            $totalmingguini += $row['harga'];
        }

        $totalCash = 0;
        foreach ($data as $row) {
            if ($row['pembayaran'] === 'Cash') {
                $totalCash += $row['harga'];
            }
        }

        $totalQRIS = 0;
        foreach ($data as $row) {
            if ($row['pembayaran'] === 'QRIS') {
                $totalQRIS += $row['harga'];
            }
        }

        $totalQRISbulan = 0;
        foreach ($databulanini as $row) {
            if ($row['pembayaran'] === 'QRIS') {
                $totalQRISbulan += $row['harga'];
            }
        }

        $total = 0;
        foreach ($data as $row) {
            $total += $row['harga'];
        }

        return view('rekap', ['title' => 'Rekap',], compact('data', 'totalbulanini', 'totalmingguini', 'totalQRISbulan', 'totalCash', 'totalQRIS', 'total', 'tanggal'));
    }

    public function hapus($id)
    {
        bayar::destroy($id);
        return redirect()->route('rekap')->with('hapus', 'Data berhasil dihapus');
    }
}
