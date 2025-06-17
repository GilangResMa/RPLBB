// Harga per malam (dalam Rupiah)
const PRICE_PER_NIGHT = 500000;

// Set minimum date to today
document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("checkin").min = today;
    document.getElementById("checkout").min = today;

    // Update checkout minimum when checkin changes
    document.getElementById("checkin").addEventListener("change", function () {
        const checkinDate = new Date(this.value);
        checkinDate.setDate(checkinDate.getDate() + 1);
        document.getElementById("checkout").min = checkinDate
            .toISOString()
            .split("T")[0];
        calculatePrice();
    });

    document
        .getElementById("checkout")
        .addEventListener("change", calculatePrice);
    document
        .getElementById("persons")
        .addEventListener("change", calculatePrice);

    // Thumbnail image click functionality
    const thumbnails = document.querySelectorAll(".thumbnail-grid img");
    const mainImage = document.querySelector(".main-image img");

    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener("click", function () {
            const newSrc = this.src;
            const newAlt = this.alt;

            // Update main image
            mainImage.src = newSrc;
            mainImage.alt = newAlt;

            // Add active state
            thumbnails.forEach((thumb) =>
                thumb.classList.remove("ring-2", "ring-red-500")
            );
            this.classList.add("ring-2", "ring-red-500");
        });
    });
});

function calculatePrice() {
    const checkinDate = new Date(document.getElementById("checkin").value);
    const checkoutDate = new Date(document.getElementById("checkout").value);
    const persons = parseInt(document.getElementById("persons").value);

    if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
        // Hitung jumlah malam
        const timeDiff = checkoutDate.getTime() - checkinDate.getTime();
        const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));

        // Hitung total harga
        let totalPrice = nights * PRICE_PER_NIGHT;

        // Tambahan biaya untuk person ekstra (opsional)
        if (persons > 2) {
            totalPrice += (persons - 2) * 100000 * nights; // 100k per person ekstra per malam
        }

        // Update tampilan harga
        document.getElementById(
            "total-price"
        ).textContent = `Rp ${totalPrice.toLocaleString("id-ID")}`;
        document.getElementById(
            "nights-info"
        ).textContent = `${nights} malam × ${persons} orang`;
        document.getElementById("price-details").style.display = "block";

        // Store booking data for payment page
        localStorage.setItem(
            "checkin",
            document.getElementById("checkin").value
        );
        localStorage.setItem(
            "checkout",
            document.getElementById("checkout").value
        );
        localStorage.setItem("persons", persons);
        localStorage.setItem("totalPrice", totalPrice);
    } else {
        document.getElementById("total-price").textContent = "Rp 0";
        document.getElementById("price-details").style.display = "none";
    }
}

// Validate booking before redirect
document.querySelector(".booking-btn").addEventListener("click", function (e) {
    const checkin = document.getElementById("checkin").value;
    const checkout = document.getElementById("checkout").value;

    if (!checkin || !checkout) {
        e.preventDefault();
        alert("Silakan pilih tanggal check-in dan check-out terlebih dahulu");
        return false;
    }

    if (new Date(checkout) <= new Date(checkin)) {
        e.preventDefault();
        alert("Tanggal check-out harus setelah tanggal check-in");
        return false;
    }

    // If validation passes, the link will work normally
    return true;
});
