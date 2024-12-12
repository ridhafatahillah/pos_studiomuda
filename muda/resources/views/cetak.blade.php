<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'https://candaan-api.vercel.app/api/text/random',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
]);

$response = curl_exec($curl);

curl_close($curl);
$meme = json_decode($response, true);
if ($data['paket'] == 'Premium') {
    $hargaPaket = 50000;
} elseif ($data['paket'] == 'Regular') {
    $hargaPaket = 30000;
} else {
    $hargaPaket = 0;
}

// Membuat objek DateTime untuk waktu saat ini
$dateTime = new DateTime();

// Memformat tanggal dan waktu saat ini sesuai keinginan
$tanggal = $dateTime->format('d') . ' ' . bulan($dateTime->format('m')) . ' ' . $dateTime->format('Y');
$waktu = $dateTime->format('H:i');
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struk Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            width: 58mm;
            height: 297mm;
            font-family: monospace;
            margin: 0;
            /* Reset default margin */
        }

        h6 {
            margin-bottom: 3px;
        }

        .receipt {
            font-size: 12px;
            margin: auto;
            padding-right: 5px;
            display: flex;
            flex-direction: column;

        }

        .bawah {
            color: white;
        }

        .receipt h4,
        .receipt h5,
        .receipt p {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .receipt h4 {
            margin-bottom: 5px;
        }

        .receipt .details {
            margin-bottom: 10px;
        }

        .receipt .details .row {
            display: flex;
            justify-content: space-between;
        }

        .receipt .total {
            border-top: 1px dashed #000;
            padding-top: 5px;
            margin-top: auto;
        }

        /*.receipt .total .row {
      font-weight: bold;
    }*/

        .receipt .text-center {
            text-align: center;
        }

        .receipt .dotted {
            border-bottom: 1px dotted #000;
        }

        .receipt .details .name-time {
            display: flex;
            justify-content: space-between;
        }

        .receipt img {
            width: 90%;
            /* Adjust the width as needed */
            display: block;
            margin: auto;
            /* Center the image */
            margin-bottom: 10px;
            /* Add some bottom margin */
        }

        .receipt .text-center p {
            margin-bottom: 5px;
            /* Adjust spacing for text center paragraphs */
        }

        .receipt .price {
            text-align: right;
        }

        .meme {
            margin-bottom: 3rem;
        }

        @media only print and (max-width: 400px) {
            body {
                width: 75mm;
                scale: 130% margin-top 10px;
                /* Adjust width for smaller screens */
            }

            .receipt {
                font-size: 12px;
                margin-right: 0.25in;
                /* Adjust font size for smaller screens */
            }

            .meme {
                margin-bottom: 3rem !important;
            }

        }

        @media only screen and (max-width: 400px) {
            body {
                width: 70mm;
                /* Adjust width for smaller screens */
            }

            .receipt {
                font-size: 10px;
                /* Adjust font size for smaller screens */
            }
        }
    </style>
</head>

<body>
    <div class="receipt">
        <!-- masukkan logo img/logo.png dan sesuaikan besarnya -->
        <img src="img/logo2.png" alt="" srcset="" class="mb-2">
        <p class="text-center">Jl. Kapuas No.36 Mentaos, Banjarbaru Utara</p>
        <p class="text-center">Telp: +62 838-6588-5653</p>
        <p class="text-center">studiomuda.com</p>

        <!-- buat garis batas putus-putus -->
        <div class="total dotted">
            <div class="name-time text-center">
                <h6>Nama : {{ $data['nama'] }}</h6>
                <h6 class="pb-1">Sesi : {{ $data['jam'] }}</h6>
            </div>
        </div>
        <div class="details dotted">
            <?php if ( $data['paket']  == "Regular" ||  $data['paket']  == "Premium") : ?>
            <div class="row">
                <div class="col-7">
                    <h6>Paket: {{ $data['paket'] }}</h6>
                </div>
                <div class="col-5 text-end">
                    <h6 class="text-end">{{ formatRupiah($hargaPaket) }}</h6>
                </div>
            </div>
            <?php endif; ?>
            {{-- {{ dd($data) }} --}}
            <?php if ($data['tambahan_orang'] > 0) : ?>
            <div class="row">
                <div class="col-8">
                    <h6>- Add Orang : <?= $data['tambahan_orang'] ?></h6>
                </div>
                <div class="col-4 text-end">
                    <h6 class="price"><?= formatRupiah(20000 * $data['tambahan_orang']) ?></h6>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($data['tambahan_foto'] > 0) : ?>
            <div class="row">
                <div class="col-8">
                    <h6>- Add Photo : <?= $data['tambahan_foto'] ?></h6>
                </div>
                <div class="col-4 text-end">
                    <h6 class="price"><?= formatRupiah(10000 * $data['tambahan_foto']) ?></h6>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($data['tambahan_waktu'] > 0) : ?>
            <div class="row">
                <div class="col-8">
                    <h6>- Add Waktu : <?= $data['tambahan_waktu'] ?></h6>
                </div>
                <div class="col-4 text-end">
                    <h6 class="price"><?= formatRupiah((10000 * $data['tambahan_waktu']) / 6) ?></h6>
                </div>
            </div>
            <?php endif; ?>
            <div class="total dotted">
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-start">Pembayaran:</h6>
                        <h6 class="text-start">Subtotal:</h6>

                    </div>
                    <div class="col-6">
                        <h6 class="price"><?= $data['pembayaran'] ?></h6>
                        <h6 class="price"><?= formatRupiah($data['harga']) ?></h6>

                    </div>
                    <div class="row mb-1">
                    </div>

                </div>
            </div>
            <div class="text-center">
                <h6>-- <?= $tanggal . ' ' . $waktu ?> --</h6>
            </div>
            <div class="text-center">
                <h6>Thank You</h6>
            </div>
            <div class="text-center">
                <h6 class="my-2">Meme for Today</h6>
                <h6 class="mb-1 mt-3"><?= $meme['data'] ?></h6>
            </div>
        </div>
</body>

</html>
<!-- buat script untuk silent print  -->
<script>
    window.print();
</script>
