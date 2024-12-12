    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <x-nav-link href="/" :active="request()->is('/')">
                <x-slot:icon>bi bi-grid</x-slot:icon>
                Dashboard</x-nav-link>
            <li class="nav-heading">DATA</li>
            <x-nav-link href="rekap" :active="request()->is('rekap')">
                <x-slot:icon>bi bi-currency-dollar</x-slot:icon>
                Rekap</x-nav-link>
            @if (Auth::user()->role == 'admin')
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <x-nav-link href="master" :active="request()->is('master')">
                    <x-slot:icon>bi bi-people</x-slot:icon>
                    Pelanggan</x-nav-link>
                <li class="nav-heading">Announcement</li>
                <x-nav-link href="#" :active="request()->is('announ')" onclick="kirimNotes()">
                    <x-slot:icon>bi bi-megaphone</x-slot:icon>
                    Kirim Notes</x-nav-link>
                <x-nav-link href="#" onclick="hapusNotes()" :active="request()->is('announ')">
                    <x-slot:icon>bi bi-trash3-fill</x-slot:icon>
                    Hapus Notes</x-nav-link>
                <x-nav-link href="#" onclick="kirimPeringatan()" :active="request()->is('announ')">
                    <x-slot:icon>bi bi-exclamation-triangle-fill</x-slot:icon>
                    Kirim Pengumuman</x-nav-link>
                <script>
                    // tambahkan tulisan di kolom notes pada tabel users 
                    // var notes = '';


                    function kirimNotes() {
                        Swal.fire({
                            title: 'Kirim Pesan',
                            input: 'textarea',
                            inputPlaceholder: 'Tulis pesan disini...',
                            showCancelButton: true,
                            confirmButtonText: 'Kirim',
                            cancelButtonText: 'Batal',
                            showLoaderOnConfirm: true,
                            preConfirm: (pesan) => {
                                if (!pesan) {
                                    Swal.showValidationMessage('Pesan tidak boleh kosong');
                                    return false;
                                }
                                return new Promise((resolve) => {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'kirimNotes',
                                        data: {
                                            notes: pesan,
                                            _token: $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function(data) {
                                            Swal.fire({
                                                title: 'Berhasil',
                                                text: 'Pesan berhasil dikirim',
                                                icon: 'success'
                                            });
                                            resolve();
                                        },
                                        error: function(xhr, status, error) {
                                            Swal.fire({
                                                title: 'Error',
                                                text: 'Gagal mengirim pesan: ' + error,
                                                icon: 'error'
                                            });
                                            resolve(); // Resolve untuk menutup loader
                                        }
                                    });
                                });
                            }
                        });
                    }


                    function kirimPeringatan() {
                        Swal.fire({
                            title: 'Kirim Peringatan',
                            input: 'textarea',
                            inputPlaceholder: 'Tulis pesan di sini...',
                            showCancelButton: true,
                            confirmButtonText: 'Kirim',
                            cancelButtonText: 'Batal',
                            showLoaderOnConfirm: true,
                            preConfirm: async (pesan) => { // Ubah menjadi async function
                                if (!pesan) {
                                    Swal.showValidationMessage('Pesan tidak boleh kosong');
                                    return false;
                                }
                                // Kirim fetch POST ke http://10.10.10.2:3001/webhook
                                const data = {
                                    title: 'Pengumuman',
                                    message: pesan
                                };
                                const url = 'https://danger.studiomuda.com/webhook';
                                try {
                                    const response = await fetch(url, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify(data)
                                    });

                                    if (!response.ok) {
                                        // Cek status kode dan tampilkan pesan error yang sesuai
                                        const errorRes = await response.json(); // Dapatkan respons error dari server
                                        throw new Error(errorRes.message || 'Gagal mengirim pesan');
                                    }

                                    const respon = await response.json();
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: 'Pesan berhasil dikirim: ' + respon
                                            .message, // Menampilkan pesan dari server
                                        icon: 'success'
                                    });
                                } catch (error) {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Gagal mengirim pesan: ' + error
                                            .message, // Menggunakan error.message untuk deskripsi lebih baik
                                        icon: 'error'
                                    });
                                }
                            }
                        });
                    }
                </script>
                <script>
                    // fetch get ke hapusnotes
                    function hapusNotes() {
                        $.ajax({
                            type: 'GET',
                            url: 'hapusNotes',
                            success: function(data) {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Pesan berhasil dihapus',
                                    icon: 'success'
                                })
                            }
                        })
                    }
                </script>
            @endif




        </ul>

    </aside><!-- End Sidebar-->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
