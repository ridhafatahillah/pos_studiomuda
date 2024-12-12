document.addEventListener("DOMContentLoaded", function () {
    var formCetak = document.getElementById("cetak");

    if (formCetak) {
        formCetak.addEventListener("submit", async function (event) {
            event.preventDefault();

            var formData = new FormData(event.target);
            var pembayaran = formData.get("pembayaran");
            var nama = formData.get("nama");
            var jam = formData.get("jam");
            var nomorhp = formData.get("nomorhp");
            var tambahanorang = formData.get("tambahan_orang");
            var tambahanwaktu = formData.get("tambahan_waktu");
            var tambahanfoto = formData.get("tambahan_foto");
            var harga = formData.get("harga");
            var paket = formData.get("paket");

            var getPHP =
                "nama=" +
                encodeURIComponent(nama) +
                "&jam=" +
                encodeURIComponent(jam) +
                "&tambahan_orang=" +
                encodeURIComponent(tambahanorang) +
                "&tambahan_waktu=" +
                encodeURIComponent(tambahanwaktu) +
                "&tambahan_foto=" +
                encodeURIComponent(tambahanfoto) +
                "&harga=" +
                encodeURIComponent(harga) +
                "&pembayaran=" +
                encodeURIComponent(pembayaran) +
                "&paket=" +
                encodeURIComponent(paket);

            // Dapatkan token CSRF
            var csrfToken = formData.get("_token"); // Pastikan token CSRF tersedia dalam form

            if (pembayaran == "QRIS") {
                try {
                    // Melakukan permintaan ke server menggunakan fetch API
                    var response = await fetch("php/placeOrder.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                            "X-CSRFToken": csrfToken, // Sertakan token CSRF di sini
                        },
                        body: new URLSearchParams(formData), // Kirim semua data form
                    });

                    // Memastikan bahwa permintaan berhasil
                    if (!response.ok) {
                        throw new Error(
                            "Terjadi kesalahan saat mengirim permintaan."
                        );
                    }

                    // Mengambil respons sebagai JSON
                    var responseData = await response.json();
                    var snapToken = responseData.token;

                    console.log("Snap Token:", snapToken);
                    window.snap.pay(snapToken, {
                        onSuccess: function (result) {
                            console.log(result);
                            // post nama dan harga ke post.php

                            fetch("bayar", {
                                method: "POST",
                                headers: {
                                    "Content-Type":
                                        "application/x-www-form-urlencoded",
                                    "X-CSRFToken": csrfToken, // Sertakan token CSRF di sini juga
                                },
                                body: new URLSearchParams(formData),
                            })
                                .then((response) => response.text())
                                .then((data) => console.log(data))
                                .catch((error) =>
                                    console.error("Error:", error)
                                );
                            // window.location.href = "/";
                            window.location.href = "/";
                            window.open("cetak?" + getPHP, "_blank");
                        },
                        onPending: function (result) {
                            alert("Menunggu pembayaran...");
                            console.log(result);
                        },
                        onError: function (result) {
                            alert("Pembayaran gagal!");
                            console.log(result);
                        },
                        onClose: function () {
                            alert("Anda menutup popup pembayaran.");
                        },
                    });
                } catch (error) {
                    console.error("Error:", error.message);
                }
            } else {
                // Jika bukan pembayaran QRIS, lakukan sesuatu (misalnya, POST ke endpoint lain)
                var url = "bayar"; // Ganti dengan URL yang sesuai
                formData.append("_token", csrfToken); // Pastikan token CSRF disertakan
                try {
                    var response = await fetch(url, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                            "X-CSRFToken": csrfToken, // Sertakan token CSRF di sini juga
                        },
                        body: new URLSearchParams(formData),
                    });
                    if (!response.ok) {
                        throw new Error(
                            "Terjadi kesalahan saat melakukan pembayaran."
                        );
                    }
                    console.log("Pembayaran sukses!");
                    console.log(nomorhp);
                    window.location.href = "/";
                    window.open("cetak?" + getPHP, "_blank");
                } catch (error) {
                    console.error("Error:", error.message);
                }
            }
        });
    }
});
