<?php
// Import Midtrans Library
require_once dirname(__FILE__) . '/midtrans/Midtrans.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
}

// Set Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-FXSMeql3iJgZ2dJ6kRF7SVEk';
// Set Environment (Development/Sandbox)
\Midtrans\Config::$isProduction = false;

// Ambil data nama dan harga dari POST request
$nama = $_POST['nama'];
$harga = $_POST['harga'];

// Buat array params untuk request token pembayaran
$params = array(
    'transaction_details' => array(
        'order_id' => rand(), // Gunakan order_id yang unik, bisa diganti dengan sesuatu yang unik seperti timestamp
        'gross_amount' => $harga, // Harga total pembayaran
    ),
    'customer_details' => array(
        'first_name' => $nama, // Nama pelanggan
    ),
);

// Dapatkan token pembayaran menggunakan Midtrans Snap API
$snapToken = \Midtrans\Snap::getSnapToken($params);

// Kirimkan token pembayaran kembali ke halaman web dalam format JSON
echo json_encode(array('token' => $snapToken));
