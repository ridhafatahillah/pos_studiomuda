<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title }} | Studio Muda BJB</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    {{-- buat faviocn --}}
    <link rel="icon" href="img/favicon.png" type="image/x-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    {{-- <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet"> --}}
    {{-- <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet"> --}}
    {{-- <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"> --}}
    {{-- <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> --}}
    {{-- bootsrap 5 link cdn --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">



    <script src="js/copy.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Auth::user()->notif == 1)
        <audio id="notificationSound" src="among.mp3" preload="auto"></audio>
        <audio id="duitSound" src="duit.mp3" preload="auto"></audio>


        <script>
            // Fungsi untuk cek notifikasi setiap 5 detik
            setInterval(async () => {
                try {
                    const response = await fetch(
                        "https://danger.studiomuda.com/notification"
                    );
                    const data = await response.json();

                    if (data.message) {
                        // Mainkan suara notifikasi
                        if (data.title == "Pengumuman") {
                            const sound = document.getElementById("notificationSound");
                            sound.play();
                        } else {
                            const sound = document.getElementById("duitSound");
                            sound.play();
                        }

                        Swal.fire({
                            title: data.title,
                            text: data.message,
                            icon: "warning",
                            confirmButtonText: "OK",
                        });
                    }
                } catch (error) {
                    console.error(
                        "Error fetching notification:",
                        error
                    );
                }
            }, 5000); // Set interval ke 5 detik
        </script>
    @endif


</head>
