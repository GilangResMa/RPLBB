document.addEventListener("DOMContentLoaded", function () {
    const checkinInput = document.getElementById("checkin");
    const checkoutInput = document.getElementById("checkout");
    const personsSelect = document.getElementById("persons");
    const totalPriceElement = document.getElementById("total-price");
    const priceDetailsElement = document.getElementById("price-details");
    const nightsInfoElement = document.getElementById("nights-info");
    const bookingBtn = document.querySelector(".booking-btn");

    // Room pricing configuration
    const ROOM_PRICE_PER_NIGHT = 150000; // Rp 150,000 per night
    const EXTRA_PERSON_PRICE = 50000; // Rp 50,000 per extra person per night

    // Show initial price per night
    if (totalPriceElement) {
        totalPriceElement.textContent = formatCurrency(ROOM_PRICE_PER_NIGHT) + "/malam";
        if (nightsInfoElement) {
            nightsInfoElement.textContent = "Harga per malam untuk 1 orang";
        }
        if (priceDetailsElement) {
            priceDetailsElement.style.display = "block";
        }
    }

    // Set minimum date to today
    const today = new Date().toISOString().split("T")[0];
    if (checkinInput) checkinInput.min = today;

    if (checkinInput) {
        checkinInput.addEventListener("change", function () {
            // Set checkout minimum date to one day after checkin
            const checkinDate = new Date(this.value);
            checkinDate.setDate(checkinDate.getDate() + 1);
            if (checkoutInput) {
                checkoutInput.min = checkinDate.toISOString().split("T")[0];
            }
            calculatePrice();
        });
    }

    if (checkoutInput) {
        checkoutInput.addEventListener("change", calculatePrice);
    }

    if (personsSelect) {
        personsSelect.addEventListener("change", calculatePrice);
    }

    function calculatePrice() {
        const checkinDate = new Date(checkinInput.value);
        const checkoutDate = new Date(checkoutInput.value);
        const persons = parseInt(personsSelect.value);

        // If no dates selected, show price per night
        if (!checkinInput.value || !checkoutInput.value) {
            // Extra charge mulai dari orang ke-3 (lebih dari 2 orang)
            const extraPersons = persons > 2 ? persons - 2 : 0;
            const basePrice = ROOM_PRICE_PER_NIGHT + (extraPersons * EXTRA_PERSON_PRICE);
            
            totalPriceElement.textContent = formatCurrency(basePrice) + "/malam";
            if (nightsInfoElement) {
                let priceInfo = `Harga per malam untuk ${persons} orang`;
                if (extraPersons > 0) {
                    priceInfo += ` (+${extraPersons} orang tambahan)`;
                }
                nightsInfoElement.textContent = priceInfo;
            }
            if (priceDetailsElement) {
                priceDetailsElement.style.display = "block";
            }
            return;
        }

        if (checkoutDate <= checkinDate) {
            alert("Tanggal check-out harus setelah tanggal check-in");
            checkoutInput.value = "";
            return;
        }

        // Calculate number of nights
        const timeDiff = checkoutDate.getTime() - checkinDate.getTime();
        const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));

        // Calculate prices
        const roomTotal = ROOM_PRICE_PER_NIGHT * nights;
        const extraPersons = persons > 2 ? persons - 2 : 0;
        const extraPersonTotal = extraPersons * EXTRA_PERSON_PRICE * nights;
        const totalAmount = roomTotal + extraPersonTotal;

        // Store booking data in sessionStorage
        const bookingData = {
            checkin: checkinInput.value,
            checkout: checkoutInput.value,
            persons: persons,
            nights: nights,
            roomPrice: roomTotal,
            extraPersonPrice: extraPersonTotal,
            totalAmount: totalAmount,
        };

        sessionStorage.setItem("bookingData", JSON.stringify(bookingData));

        // Update display with total amount
        totalPriceElement.textContent = formatCurrency(totalAmount);
        if (nightsInfoElement) {
            let priceBreakdown = `${nights} malam × ${persons} orang`;
            if (extraPersons > 0) {
                priceBreakdown += ` (termasuk ${extraPersons} orang tambahan)`;
            }
            nightsInfoElement.textContent = priceBreakdown;
        }
        if (priceDetailsElement) {
            priceDetailsElement.style.display = "block";
        }
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        }).format(amount);
    }

    // Booking button click handler
    if (bookingBtn) {
        bookingBtn.addEventListener("click", function (e) {
            if (!checkinInput.value || !checkoutInput.value) {
                e.preventDefault();
                alert("Silakan pilih tanggal check-in dan check-out");
                return;
            }
            // Data will be passed via sessionStorage to payment page
            calculatePrice();
        });
    }

    // WhatsApp admin contact
    const whatsappBtn = document.querySelector("button:has(.fa-whatsapp)");
    if (whatsappBtn) {
        whatsappBtn.addEventListener("click", function () {
            const message = `Halo, saya ingin bertanya tentang pemesanan kamar.`;
            const whatsappUrl = `https://wa.me/6281392640030?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, "_blank");
        });
    }

    // Thumbnail image functionality
    const thumbnails = document.querySelectorAll('.thumbnail-grid img');
    const mainImage = document.querySelector('.main-image img');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            mainImage.src = this.src;
        });
    });
});