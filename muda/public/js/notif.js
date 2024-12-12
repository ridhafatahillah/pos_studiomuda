const publicVapidKey =
    "BDWBs4gaCa51wAcIFmfAK_X_IY4DB6B_gg1VcD6u4S4HnONoICR71IPK5lVrQ4ZUjd3nF-YUQHnDGvQ1Z9thrD8";

// Fungsi untuk mendaftar ke push notifications
function subscribeUser() {
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("/js/sw.js")
            .then((registration) => {
                console.log("Service Worker registered:", registration);

                // Cek apakah sudah berlangganan
                return registration.pushManager
                    .getSubscription()
                    .then((subscription) => {
                        if (subscription) {
                            // Pengguna sudah berlangganan
                            console.log(
                                "User is already subscribed:",
                                subscription
                            );
                            document.getElementById(
                                "status"
                            ).style.backgroundColor = "green";
                        } else {
                            // Pengguna belum berlangganan, lakukan subscribe
                            return registration.pushManager
                                .subscribe({
                                    userVisibleOnly: true,
                                    applicationServerKey:
                                        urlB64ToUint8Array(publicVapidKey),
                                })
                                .then((newSubscription) => {
                                    console.log(
                                        "User is subscribed:",
                                        newSubscription
                                    );
                                    document.getElementById(
                                        "status"
                                    ).style.backgroundColor = "green";

                                    // Kirim subscription ke server
                                    return fetch(
                                        "https://push.studiomuda.com/subscribe",
                                        {
                                            method: "POST",
                                            body: JSON.stringify(
                                                newSubscription
                                            ),
                                            headers: {
                                                "Content-Type":
                                                    "application/json",
                                            },
                                        }
                                    );
                                });
                        }
                    });
            })
            .then((response) => {
                if (response && response.ok) {
                    console.log("Subscription sent to server successfully.");
                } else if (response) {
                    console.error(
                        "Failed to send subscription to server:",
                        response.statusText
                    );
                }
            })
            .catch((error) => {
                console.error("Failed to subscribe the user:", error);
                document.getElementById("status").style.backgroundColor = "red";
            });
    } else {
        console.warn("Service Workers are not supported in this browser.");
        document.getElementById("status").style.backgroundColor = "yellow";
    }
}

// Konversi kunci publik VAPID dari base64
function urlB64ToUint8Array(base64String) {
    const padding = "=".repeat((4 - (base64String.length % 4)) % 4);
    const base64 = (base64String + padding)
        .replace(/-/g, "+")
        .replace(/_/g, "/");
    const rawData = window.atob(base64);
    return Uint8Array.from([...rawData].map((char) => char.charCodeAt(0)));
}

// Auto subscribe saat halaman dimuat
window.onload = function () {
    updateClock();
    subscribeUser();
};
