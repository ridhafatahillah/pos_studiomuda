self.addEventListener("push", (event) => {
    const data = event.data.json();
    const options = {
        body: data.message,
        icon: "notif.png",
        badge: "notif.png",
        tag: data.tag || "default-tag", // Gunakan tag untuk menggantikan notifikasi lama
        renotify: true, // Notifikasi baru akan menggantikan yang lama
    };

    event.waitUntil(self.registration.showNotification(data.title, options));
});
