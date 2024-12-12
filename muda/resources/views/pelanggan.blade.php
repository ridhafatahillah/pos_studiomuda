<!DOCTYPE html>
<html lang="en">
<x-head>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
</x-head>
<link rel="stylesheet" href="assets/vendor/simple-datatables/style.css">

<body>
    <x-header>
        <x-slot:date>{{ date('H:i') }}</x-slot:date>
    </x-header>

    <x-sidebar></x-sidebar>




    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Total Pendapatan
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6> Rp.<?= formatRupiah($total) ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card info-card pajak-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Total Pelanggan
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <h6> {{ $jumlah }} Customers</h6>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pt-2">
                                    <div class="col-12 d-flex justify-content-end">

                                    </div>
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Tanggal
                                                </th>
                                                <th scope="col" class="text-center">Jam</th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Tambahan
                                                    Orang
                                                </th>
                                                <th scope="col" class="text-center">Paket</th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Tambahan
                                                    Foto
                                                </th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Tambahan
                                                    Waktu
                                                </th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Pembayaran
                                                </th>
                                                <th scope="col" class="text-center">Harga</th>
                                                <th scope="col" class="text-center">Cetak</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $r)
                                                <tr>
                                                    <td class="text-center">{{ $r->nama }}</td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $r->haritanggal }}
                                                    </td>
                                                    <td class="text-center">{{ $r->jam }}</td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $r->tambahan_orang }}
                                                    </td>
                                                    <td class="text-center">{{ $r->paket }}</td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $r->tambahan_foto }}
                                                    </td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $r->tambahan_waktu }}
                                                    </td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $r->pembayaran }}
                                                    </td>
                                                    <td class="text-center">{{ formatRupiah($r->harga) }}</td>
                                                    <td class="text-center ">
                                                        <a href="/cetak?nama={{ $r->nama }}&jam={{ $r->jam }}&tambahan_orang={{ $r->tambahan_orang }}&tambahan_waktu={{ $r->tambahan_waktu }}&pembayaran={{ $r->pembayaran }}&paket={{ $r->paket }}&harga={{ $r->harga }}"
                                                            class="" target="_blank"><i
                                                                class="bi bi-printer"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="assets/vendor/quill/quill.js"></script> --}}
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    {{-- <script src="assets/vendor/php-email-form/validate.js"></script> --}}

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="js/jam.js"></script>
    {{-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> --}}

    <script>
        document.getElementById('dateInput').addEventListener('change', function() {
            window.location.href = '/rekap?tanggal=' + this.value;
        });
    </script>

</body>

</html>
