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
    } else {
        document.getElementById("total-price").textContent = "Rp 0";
        document.getElementById("price-details").style.display = "none";
    }
}
