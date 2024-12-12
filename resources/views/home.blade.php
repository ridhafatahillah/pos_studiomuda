<x-head>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
</x-head>
<!DOCTYPE html>
<html lang="en">

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "error",
                title: "Anda Bukan Admin.",
                text: "Hayoloo mau ngapain bang?",
            });
        });
    </script>
@endif

@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ session('success') }}",
            });
        });
    </script>
@endif

@if (session('notes'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "info",
                title: "Pemberitahuan",
                text: "{{ session('notes') }}",
            });
        });
    </script>
@endif

@if (session('dihapus'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ session('dihapus') }}",
            });
        });
    </script>
@endif

<body>

    <x-header></x-header>

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
                        <div class="col-lg-4 col-md-12">
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
                                        <div class="ps-3 d-flex align-items-center">
                                            <h6 id="saldoTotal"> Rp. xx.xxx.xxx </h6>
                                            <i id="eyeIcon" class="bi bi-eye-slash icon-eye  ms-2"
                                                onclick="toggleSaldo()"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card info-card pajak-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Total Cash
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cash"></i>
                                        </div>
                                        <div class="ps-3 d-flex align-items-center">
                                            <h6>
                                                <h6 id="saldoCash"> Rp. xx.xxx.xxx </h6>
                                                <i id="eyeIcon2" class="bi bi-eye-slash icon-eye  ms-2"
                                                    onclick="toggleSaldo()"></i>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card info-card rusak-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Total QRIS
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-qr-code-scan"></i>
                                        </div>
                                        <div class="ps-3 d-flex align-items-center">
                                            <h6 id='saldoQRIS'> Rp. xx.xxx.xxx</h6>
                                            <i id="eyeIcon3" class="bi bi-eye-slash icon-eye  ms-2"
                                                onclick="toggleSaldo()"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pt-2">
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                        data-bs-target="#pilihCust">
                                        Pilih Pelanggan
                                    </button>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Jam</th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Nomor HP</th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Tambahan Orang</th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">Paket
                                                </th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Tambahan Foto</th>

                                                <th scope="col" class="text-center d-none d-md-table-cell">
                                                    Tambahan Waktu</th>
                                                <th scope="col" class="text-center">Harga</th>
                                                <th scope="col" class="text-center">Edit</th>
                                                <th scope="col" class="text-center">Cetak</th>
                                                <th scope="col" class="text-center d-none d-md-table-cell">Softcopy
                                                </th>
                                                <th scope="col" class="d-none d-md-table-cell text-center">Hapus
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                @php
                                                    $harga = 0;
                                                    if ($item->paket == 'Regular') {
                                                        $harga = 30000;
                                                    } elseif ($item->paket == 'Premium') {
                                                        $harga = 50000;
                                                    }
                                                    $harga += $item->tambahan_orang * 20000;
                                                    $harga += $item->tambahan_foto * 10000;
                                                    $harga += ($item->tambahan_waktu * 10000) / 6;
                                                @endphp
                                                <tr>
                                                    <td class="text-center hovermerah" onclick='copyToClipboard(this)'
                                                        value="{{ $item->nama }}">
                                                        {{ $item->nama }}</td>
                                                    <td class="text-center">{{ $item->jam }}</td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $item->nomorhp }}</td>

                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $item->tambahan_orang }} Orang
                                                    </td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $item->paket }}
                                                    </td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $item->tambahan_foto }} Foto
                                                    </td>

                                                    <td class="text-center d-none d-md-table-cell">
                                                        {{ $item->tambahan_waktu }} Waktu
                                                    </td>
                                                    <td class="text-center">
                                                        {{ formatRupiah(hitungHarga($item->paket, $item->tambahan_orang, $item->tambahan_foto, $item->tambahan_waktu)) }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a type="button" href="#" data-bs-toggle="modal"
                                                            name="tomboledit" data-bs-target="#Edits"
                                                            data-id="{{ $item->id }}"
                                                            data-nama="{{ $item->nama }}"
                                                            data-jam="{{ $item->jam }}"
                                                            data-tambahanorang="{{ $item->tambahan_orang }}"
                                                            data-paket="{{ $item->paket }}"
                                                            data-tambahanfoto="{{ $item->tambahan_foto }}"
                                                            data-tambahanwaktu="{{ $item->tambahan_waktu }}"
                                                            data-nomorhp="{{ $item->nomorhp }}"
                                                            data-harga="{{ hitungHarga($item->paket, $item->tambahan_orang, $item->tambahan_foto, $item->tambahan_waktu) }}"><i
                                                                class="bi bi-pencil"></i></a>
                                                    </td>

                                                    <td class="text-center"><a href="#" data-bs-toggle="modal"
                                                            name="tombolcetak" data-bs-target="#Cetaks"
                                                            data-id="{{ $item->id }}"
                                                            data-nama="{{ $item->nama }}"
                                                            data-jam="{{ $item->jam }}"
                                                            data-tambahanorang="{{ $item->tambahan_orang }}"
                                                            data-paket="{{ $item->paket }}"
                                                            data-tambahanfoto="{{ $item->tambahan_foto }}"
                                                            data-tambahanwaktu="{{ $item->tambahan_waktu }}"
                                                            data-nomorhp="{{ $item->nomorhp }}"
                                                            data-harga="{{ hitungHarga($item->paket, $item->tambahan_orang, $item->tambahan_foto, $item->tambahan_waktu) }}"><i
                                                                class="bi bi-printer"></i></a></td>
                                                    <td class="text-center d-none d-md-table-cell">
                                                        <a href="https://api.whatsapp.com/send?phone={{ $item->nomorhp }}&text=Berikut%20untuk%20link%20softcopynya%20ya%20kak%20%3A%0A%0A%0A%0ASetelah%207%20hari%2C%20kami%20akan%20menghapus%20softcopynya%20dari%20link%20Google%20Drive%20diatas%2C%20maka%20dari%20itu%20dipastikan%20untuk%20mengunduh%20semua%20fotonya%20sebelum%207%20hari%20ya.%0A%0ATerima%C2%A0Kasih%C2%A0%E2%98%BA"
                                                            target="_blank"><i class="bi bi-whatsapp"></i></a>

                                                    </td>


                                                    <td
                                                        class="text-center d-none d-md-table-cell d-flex justify-content-center">
                                                        <a href="#"
                                                            onclick="confirmDelete({{ $item->id }})">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
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

        <!-- Modal Data Pelanggan -->
        <div class="modal fade" id="pilihCust" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Pelanggan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Tombol untuk menambahkan pelanggan baru -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#Post-0" data-bs-dismiss="modal">Baru</button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $item)
                                    @php
                                        $nama = $item->FNAME;
                                        $jam = $item->startsAt;
                                        $jam = date('H:i', strtotime($jam));
                                        // $jumlahfoto = hitungJumlahFoto($jumlah, $paket);
                                        $key = $item->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $nama }}</td>
                                        <td>{{ $jam }}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#Post-{{ $item->id_booking }}"
                                                data-bs-dismiss="modal">Pilih</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <x-antrian id="Post-0" class="modal fade">
            <x-slot:nama></x-slot:nama>
            <x-slot:jam>{{ date('H:i') }}</x-slot:jam>
            <x-slot:tambahan_orang></x-slot:tambahan_orang>
            <x-slot:paket></x-slot:paket>
            <x-slot:nomorhp></x-slot:nomorhp>
            <x-slot:tambahan_foto></x-slot:tambahan_foto>
            <x-slot:tambahan_waktu></x-slot:tambahan_waktu>

        </x-antrian>

        <!-- buat modal bedasarkan data-id dari tombol edit -->
        @foreach ($bookings as $item)
            <x-antrian class="modal fade" id="Post-{{ $item->id_booking }}">
                <x-slot:nama>{{ $item->FNAME }}</x-slot:nama>
                <x-slot:jam>{{ date('H:i', strtotime($item->startsAt)) }}</x-slot:jam>
                <x-slot:tambahan_orang>{{ intval($item->ORG) - 1 }}</x-slot:tambahan_orang>
                <x-slot:paket>{{ $item->Q4 }}</x-slot:paket>
                <x-slot:nomorhp>{{ $item->TLP }}</x-slot:nomorhp>
                <x-slot:tambahan_foto>{{ '0' }}</x-slot:tambahan_foto>
                <x-slot:tambahan_waktu>{{ '0' }}</x-slot:tambahan_waktu>
            </x-antrian>
        @endforeach
        @foreach ($data as $item)
            <x-modal-detail class="modal
                fade" id="Edit{{ $item->id }}">
                <x-slot:id>{{ $item->id }}</x-slot:id>
                <x-slot:nama>{{ $item->nama }}</x-slot:nama>
                <x-slot:jam>{{ $item->jam }}</x-slot:jam>
                <x-slot:tambahan_orang>{{ $item->tambahan_orang }}</x-slot:tambahan_orang>
                <x-slot:paket>{{ $item->paket }}</x-slot:paket>
                <x-slot:tambahan_foto>{{ $item->tambahan_foto }}</x-slot:tambahan_foto>
                <x-slot:tambahan_waktu>{{ $item->tambahan_waktu }}</x-slot:tambahan_waktu>
            </x-modal-detail>
        @endforeach
        <x-cetak class="modal
        fade" id="Cetaks">
        </x-cetak>

        <x-edit class="modal fade" id="Edits"></x-edit>

        @foreach ($data as $item)
            <!-- Modal Delete untuk setiap item -->
            <div class="modal
                fade" id="ModalDelete{{ $item->id }}" tabindex="-1"
                aria-labelledby="ModalDelete" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalDelete">Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/delete/' . $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                                <button type="submit" name="submit" class="btn btn-danger mt-3">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->


</body>
<script src="/js/pembayaran.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
    data-client-key="Mid-client-AX0DDRI_dE1Xf4n8"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script>
    function confirmDelete(itemId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda tidak akan dapat mengembalikan ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan penghapusan item di sini, misalnya:
                window.location.href = '/delete/' + itemId;
                // atau gunakan AJAX untuk menghapus
                console.log('Item dengan ID ' + itemId + ' dihapus'); // Contoh
            }
        });
    }
</script>
<script>
    let isSaldoVisible = false;
    const saldoTotal = "Rp.  {{ formatRupiah($total) }}";
    const saldoCash = "Rp. {{ formatRupiah($totalCash) }}";
    const saldoQRIS = "Rp. {{ formatRupiah($totalQRIS) }}";
    const hiddenSaldo = "Rp. xx.xxx.xxx";

    function toggleSaldo() {
        const saldoTotalElement = document.getElementById("saldoTotal");
        const saldoCashElement = document.getElementById("saldoCash");
        const saldoQRISElement = document.getElementById("saldoQRIS");
        const eyeIcon = document.getElementById("eyeIcon");
        const eyeIcon2 = document.getElementById("eyeIcon2");
        const eyeIcon3 = document.getElementById("eyeIcon3");
        if (isSaldoVisible) {
            saldoTotalElement.textContent = hiddenSaldo;
            saldoQRISElement.textContent = hiddenSaldo;
            saldoCashElement.textContent = hiddenSaldo;
            eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
            eyeIcon3.classList.replace("bi-eye", "bi-eye-slash");
            eyeIcon2.classList.replace("bi-eye", "bi-eye-slash");

        } else {
            saldoTotalElement.textContent = saldoTotal;
            saldoQRISElement.textContent = saldoQRIS;
            saldoCashElement.textContent = saldoCash;
            eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
            eyeIcon2.classList.replace("bi-eye", "bi-eye-slash");
            eyeIcon3.classList.replace("bi-eye", "bi-eye-slash");

        }

        isSaldoVisible = !isSaldoVisible;
    }
</script>
<script src="js/notif.js"></script>



</html>
