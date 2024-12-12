<?php
function formatRupiah($angka)
{
    $hasil_rupiah =  number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function hitungHarga($paket, $tambahanOrang, $tambahanFoto, $tambahanWaktu)
{
    $harga = 0;
    if ($paket == 'Regular') {
        $harga = 30000;
    } elseif ($paket == 'Premium') {
        $harga = 50000;
    }

    $harga += intval($tambahanOrang) * 20000;
    $harga += intval($tambahanFoto) * 10000;
    $harga += intval($tambahanWaktu) * 10000 / 6;
    return $harga;
}
// Atur lokalitas ke bahasa Indonesia
setlocale(LC_TIME, 'id_ID');

// Mendapatkan nama bulan dalam bahasa Indonesia
function getIndonesianMonth($month)
{
    $months = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];
    return $months[$month - 1];
}

// Contoh penggunaan
$bulan = date('n'); // Ambil angka bulan saat ini
$nama_bulan = getIndonesianMonth($bulan);


// Mengatur zona waktu default ke Asia/Makassar (zona waktu Banjarmasin)
date_default_timezone_set('Asia/Makassar');
// buat bulan dalam bahasa indonesia
function bulan($bln)
{
    $bulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];
    return $bulan[$bln];
}

// Membuat objek DateTime untuk waktu saat ini
$dateTime = new DateTime();

// Memformat tanggal dan waktu saat ini sesuai keinginan
$tanggal = $dateTime->format('d') . ' ' . bulan($dateTime->format('m')) . ' ' . $dateTime->format('Y');
$waktu = $dateTime->format('H:i');
// Menampilkan tanggal dan waktu dalam zona waktu Banjarmasin
