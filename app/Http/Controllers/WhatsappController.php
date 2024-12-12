<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function sendMessageAdd(Request $request)
    {
        $nama = $request->input('nama');
        $jam = $request->input('jam');
        $tambahanOrang = $request->input('tambahan_orang');
        $paket = $request->input('paket');
        $tambahanFoto = $request->input('tambahan_foto');
        $tambahanWaktu = $request->input('tambahan_waktu');

        // Setup cURL
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://log.studiomuda.com/message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode([
                'phoneNumber' => "081250368366",
                'message' => "Data Dibuat Dengan Rincian\n\nNama : $nama\nJam : $jam\nTambahan Orang : $tambahanOrang\nPaket : $paket\nTambahan Foto : $tambahanFoto\nTambahan Waktu : $tambahanWaktu",
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: connect.sid=s%3AD6ZeFKY9iu9S-WJggQyTe2FtX_v5Q45k.%2BZpbwJd1RxhuVok931FTay0lz5xgtV0fNhPPvG4FEng'
            ),
        ));

        // Eksekusi cURL
        $response = curl_exec($curl);

        // Tutup cURL
        curl_close($curl);
    }
    public function sendMessageEdit(Request $request)
    {
        $nama = $request->input('nama');
        $jam = $request->input('jam');
        $tambahanOrang = $request->input('tambahan_orang');
        $paket = $request->input('paket');
        $tambahanFoto = $request->input('tambahan_foto');
        $tambahanWaktu = $request->input('tambahan_waktu');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://log.studiomuda.com/message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'phoneNumber' => "081250368366",
                'message' => "Data Diedit Dengan Rincian\n\nNama : $nama\nJam : $jam\nTambahan Orang : $tambahanOrang\nPaket : $paket\nTambahan Foto : $tambahanFoto\nTambahan Waktu : $tambahanWaktu",
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: connect.sid=s%3AD6ZeFKY9iu9S-WJggQyTe2FtX_v5Q45k.%2BZpbwJd1RxhuVok931FTay0lz5xgtV0fNhPPvG4FEng'
            ),
        ));

        // Eksekusi cURL
        $response = curl_exec($curl);

        // Tutup cURL
        curl_close($curl);
    }
    public function cetakMessage(Request $request)
    {
        $nama = $request->input('nama');
        $jam = $request->input('jam');
        $tambahanOrang = $request->input('tambahan_orang');
        $paket = $request->input('paket');
        $tambahanFoto = $request->input('tambahan_foto');
        $tambahanWaktu = $request->input('tambahan_waktu');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://log.studiomuda.com/message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'phoneNumber' => "081250368366",
                'message' => "Data Dicetak Dengan Rincian\n\nNama : $nama\nJam : $jam\nTambahan Orang : $tambahanOrang\nPaket : $paket\nTambahan Foto : $tambahanFoto\nTambahan Waktu : $tambahanWaktu",
            ]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: connect.sid=s%3AD6ZeFKY9iu9S-WJggQyTe2FtX_v5Q45k.%2BZpbwJd1RxhuVok931FTay0lz5xgtV0fNhPPvG4FEng'
            ),
        ));

        // Eksekusi cURL
        $response = curl_exec($curl);

        // Tutup cURL
        curl_close($curl);
    }
}
