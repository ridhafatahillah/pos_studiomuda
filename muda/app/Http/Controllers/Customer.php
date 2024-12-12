<?php

namespace App\Http\Controllers;

use App\Models\bayar;
use App\Models\CustomerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Customer extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = bayar::where('haritanggal', Carbon::now()->format('Y-m-d'))->get();

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

        $total = 0;
        foreach ($data as $row) {
            $total += $row['harga'];
        }

        $data = CustomerModel::all();
        $bookings = $this->fetchBooking();




        return view('home', ['title' => 'Dashboard', 'waktu' => date('H:i'), 'bookings' => $bookings], compact('data', 'totalCash', 'totalQRIS', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function fetchBooking()
    {
        $ch = curl_init();

        // login api with basic auth
        $username = "studiomudabjb@gmail.com";
        $password = "ak_uanANu6ukRpgYLxLd5HbXaSHhCrcGsvzd7HDMSMULp8ffG73RQ";
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_URL, "https://api.youcanbook.me/v1/14331404-1c5e-44cf-a548-aba443b0d0e5/bookings?fields=id,startsAt,answers,answers.code,answers.string&cancelledStatus=0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, WhatsappController $whatsappController)
    {
        $data = [
            'nama' => $request->input('nama'),
            'jam' => $request->input('jam'),
            'paket' => $request->input('paket'),
            'tambahan_orang' => intval($request->input('tambahan_orang')),
            'nomorhp' => $request->input('nomorhp'),
            'tambahan_foto' => $request->input('tambahan_foto'),
            'tambahan_waktu' => $request->input('tambahan_waktu'),
        ];
        CustomerModel::create($data);
        if (auth()->user()->notif == 1) {
            $whatsappController->sendMessageAdd($request);
        }

        return redirect('/');

        // redirect()->route('home');

        // dd($request->all());
    }
    // public function storeAndSend(Request $request, WhatsappController $whatsappController)
    // {

    //     $this->store($request);
    //     $whatsappController->sendMessageAdd($request);
    //     return redirect('/');
    // }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function hitungHarga($paket, $tambahanOrang, $tambahanFoto, $tambahanWaktu)
    {
        $harga = 0;
        if ($paket == 'Regular') {
            $harga = 30000;
        } elseif ($paket == 'Premium') {
            $harga = 70000;
        }

        $harga += intval($tambahanOrang) * 20000;
        $harga += intval($tambahanFoto) * 10000;
        $harga += intval($tambahanWaktu) * 10000;
        return $harga;
    }

    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama' => $request->input('nama'),
            'jam' => $request->input('jam'),
            'paket' => $request->input('paket'),
            'tambahan_orang' => $request->input('tambahan_orang'),
            'tambahan_foto' => $request->input('tambahan_foto'),
            'tambahan_waktu' => $request->input('tambahan_waktu'),
        ];
        // dd($data);
        CustomerModel::where('id', $id)->update($data);
    }

    public function updateAndSend(Request $request, WhatsappController $whatsappController)
    {
        $data = [
            'nama' => $request->input('nama'),
            'jam' => $request->input('jam'),
            'paket' => $request->input('paket'),
            'nomorhp' => $request->input('nomorhp'),
            'tambahan_orang' => $request->input('tambahan_orang'),
            'tambahan_foto' => $request->input('tambahan_foto'),
            'tambahan_waktu' => $request->input('tambahan_waktu'),
        ];
        CustomerModel::where('id', $request->input('id'))->update($data);
        if (auth()->user()->notif == 1) {
            $whatsappController->sendMessageEdit($request);
        }
        return redirect('/')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CustomerModel::destroy($id);
        return redirect('/')->with('dihapus', 'Data berhasil dihapus');
    }

    public function bayar(Request $request)
    {
        $data = [
            'nama' => $request->input('nama'),
            'jam' => $request->input('jam'),
            'paket' => $request->input('paket'),
            'haritanggal' => $request->input('haritanggal'),
            'tambahan_orang' => $request->input('tambahan_orang'),
            'tambahan_foto' => $request->input('tambahan_foto'),
            'tambahan_waktu' => $request->input('tambahan_waktu'),
            'harga' => $request->input('harga'),
            'pembayaran' => $request->input('pembayaran'),
        ];
        bayar::create($data);
        return redirect('/');
    }
    public function cetak(Request $request, WhatsappController $whatsappController)
    {
        $data = [
            'nama' => $request->input('nama'),
            'jam' => $request->input('jam'),
            'paket' => $request->input('paket'),
            'haritanggal' => $request->input('haritanggal'),
            'tambahan_orang' => $request->input('tambahan_orang'),
            'tambahan_foto' => $request->input('tambahan_foto'),
            'tambahan_waktu' => $request->input('tambahan_waktu'),
            'harga' => $request->input('harga'),
            'pembayaran' => $request->input('pembayaran'),
        ];
        if (auth()->user()->notif == 1) {
            $whatsappController->sendMessageAdd($request);
        }
        return view('cetak', ['data' => $data]);
    }
}
