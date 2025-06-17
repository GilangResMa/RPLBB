document.addEventListener("DOMContentLoaded", function () {
    const checkinInput = document.getElementById("checkin");
    const checkoutInput = document.getElementById("checkout");
    const personsSelect = document.getElementById("persons");
    const totalPriceElement = document.getElementById("total-price");
    const priceDetailsElement = document.getElementById("price-details");
    const nightsInfoElement = document.getElementById("nights-info");
    const bookingBtn = document.querySelector(".booking-btn");

    // Room pricing configuration
    const ROOM_PRICE_PER_NIGHT = 250000; // Rp 250,000 per night
    const EXTRA_PERSON_PRICE = 50000; // Rp 50,000 per extra person per night
    const TAX_RATE = 0.1; // 10% tax

    // Set minimum date to today
    const today = new Date().toISOString().split("T")[0];
    checkinInput.min = today;

    checkinInput.addEventListener("change", function () {
        // Set checkout minimum date to one day after checkin
        const checkinDate = new Date(this.value);
        checkinDate.setDate(checkinDate.getDate() + 1);
        checkoutInput.min = checkinDate.toISOString().split("T")[0];
        calculatePrice();
    });

    checkoutInput.addEventListener("change", calculatePrice);
    personsSelect.addEventListener("change", calculatePrice);

    function calculatePrice() {
        const checkinDate = new Date(checkinInput.value);
        const checkoutDate = new Date(checkoutInput.value);
        const persons = parseInt(personsSelect.value);

        if (!checkinInput.value || !checkoutInput.value) {
            totalPriceElement.textContent = "Rp 0";
            priceDetailsElement.style.display = "none";
            return;
        }

        if (checkoutDate <= checkinDate) {
            alert("Check-out date must be after check-in date");
            checkoutInput.value = "";
            return;
        }

        // Calculate number of nights
        const timeDiff = checkoutDate.getTime() - checkinDate.getTime();
        const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));

        // Calculate prices
        const roomTotal = ROOM_PRICE_PER_NIGHT * nights;
        const extraPersonTotal =
            persons > 1 ? (persons - 1) * EXTRA_PERSON_PRICE * nights : 0;
        const subtotal = roomTotal + extraPersonTotal;
        const taxAmount = subtotal * TAX_RATE;
        const totalAmount = subtotal + taxAmount;

        // Store booking data in sessionStorage
        const bookingData = {
            checkin: checkinInput.value,
            checkout: checkoutInput.value,
            persons: persons,
            nights: nights,
            roomPrice: roomTotal,
            extraPersonPrice: extraPersonTotal,
            taxAmount: taxAmount,
            totalAmount: totalAmount,
        };

        sessionStorage.setItem("bookingData", JSON.stringify(bookingData));

        // Update display
        totalPriceElement.textContent = formatCurrency(totalAmount);
        nightsInfoElement.textContent = `${nights} night(s) × ${persons} person(s)`;
        priceDetailsElement.style.display = "block";
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        }).format(amount);
    }

    // Booking button click handler
    bookingBtn.addEventListener("click", function (e) {
        if (!checkinInput.value || !checkoutInput.value) {
            e.preventDefault();
            alert("Please select check-in and check-out dates");
            return;
        }

        // Data will be passed via sessionStorage to payment page
        calculatePrice();
    });

    // WhatsApp admin contact
    document
        .querySelector("button:has(.fa-whatsapp)")
        .addEventListener("click", function () {
            const message = `Halo, saya ingin bertanya tentang pemesanan kamar.`;
            const whatsappUrl = `https://wa.me/6281392640030?text=${encodeURIComponent(
                message
            )}`;
            window.open(whatsappUrl, "_blank");
        });
});
