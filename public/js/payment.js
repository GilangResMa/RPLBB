document.addEventListener("DOMContentLoaded", function () {
    // Load booking data from sessionStorage
    loadBookingData();

    // Initialize payment method handlers
    initializePaymentMethods();

    // Initialize form submission
    initializeFormSubmission();
});

function loadBookingData() {
    const bookingData = JSON.parse(sessionStorage.getItem("bookingData"));

    if (!bookingData) {
        alert("No booking data found. Please return to room selection.");
        window.location.href = "/detailkamar";
        return;
    }

    // Format dates for display
    const checkinFormatted = formatDate(bookingData.checkin);
    const checkoutFormatted = formatDate(bookingData.checkout);

    // Update booking summary
    document.getElementById(
        "booking-dates"
    ).textContent = `${checkinFormatted} - ${checkoutFormatted}`;
    document.getElementById(
        "booking-persons"
    ).textContent = `${bookingData.persons} Person(s)`;
    document.getElementById(
        "booking-nights"
    ).textContent = `${bookingData.nights} Night(s)`;

    // Update price breakdown
    document.getElementById("room-price").textContent = formatCurrency(
        bookingData.roomPrice
    );
    document.getElementById("extra-person-price").textContent = formatCurrency(
        bookingData.extraPersonPrice
    );
    document.getElementById("tax-price").textContent = formatCurrency(
        bookingData.taxAmount
    );
    document.getElementById("total-amount").textContent = formatCurrency(
        bookingData.totalAmount
    );
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
}

function formatCurrency(amount) {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(amount);
}

function initializePaymentMethods() {
    const paymentOptions = document.querySelectorAll(".payment-option");
    const paymentDetails = document.querySelectorAll(".payment-details");

    paymentOptions.forEach((option) => {
        option.addEventListener("click", function () {
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;

            // Remove active class from all options
            paymentOptions.forEach((opt) =>
                opt.classList.remove("border-red-500", "bg-red-50")
            );

            // Add active class to selected option
            this.classList.add("border-red-500", "bg-red-50");

            // Hide all payment details
            paymentDetails.forEach((detail) => detail.classList.add("hidden"));

            // Show relevant payment details
            const selectedMethod = radio.value;
            const detailsElement = document.getElementById(
                `${selectedMethod.replace("_", "-")}-details`
            );
            if (detailsElement) {
                detailsElement.classList.remove("hidden");
            }
        });
    });

    // Initialize bank and e-wallet selection
    initializeBankSelection();
    initializeEWalletSelection();
}

function initializeBankSelection() {
    const bankOptions = document.querySelectorAll(".bank-option");

    bankOptions.forEach((option) => {
        option.addEventListener("click", function () {
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;

            // Remove active class from all bank options
            bankOptions.forEach((opt) =>
                opt.classList.remove("border-red-500", "bg-white")
            );

            // Add active class to selected bank
            this.classList.add("border-red-500", "bg-white");
        });
    });
}

function initializeEWalletSelection() {
    const ewalletOptions = document.querySelectorAll(".ewallet-option");

    ewalletOptions.forEach((option) => {
        option.addEventListener("click", function () {
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;

            // Remove active class from all e-wallet options
            ewalletOptions.forEach((opt) =>
                opt.classList.remove("border-red-500", "bg-white")
            );

            // Add active class to selected e-wallet
            this.classList.add("border-red-500", "bg-white");
        });
    });
}

function initializeFormSubmission() {
    const form = document.getElementById("payment-form");

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        // Validate form
        if (!validateForm()) {
            return;
        }

        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML =
            '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
        submitBtn.disabled = true;

        try {
            // Prepare payment data
            const paymentData = preparePaymentData();

            // Send to backend to create Midtrans transaction
            const response = await fetch("/api/create-payment", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN":
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute("content") || "",
                },
                body: JSON.stringify(paymentData),
            });

            const result = await response.json();

            if (result.success) {
                // Open Midtrans Snap popup
                window.snap.pay(result.snap_token, {
                    onSuccess: function (result) {
                        handlePaymentSuccess(result);
                    },
                    onPending: function (result) {
                        handlePaymentPending(result);
                    },
                    onError: function (result) {
                        handlePaymentError(result);
                    },
                    onClose: function () {
                        console.log("Payment popup closed");
                    },
                });
            } else {
                throw new Error(result.message || "Failed to create payment");
            }
        } catch (error) {
            console.error("Payment error:", error);
            alert("Payment failed: " + error.message);
        } finally {
            // Reset button state
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });
}

function validateForm() {
    const requiredFields = ["full-name", "email", "phone"];
    const paymentMethod = document.querySelector(
        'input[name="payment_method"]:checked'
    ).value;

    // Check required fields
    for (const fieldId of requiredFields) {
        const field = document.getElementById(fieldId);
        if (!field.value.trim()) {
            alert(`Please fill in ${field.labels[0].textContent}`);
            field.focus();
            return false;
        }
    }

    // Validate email format
    const email = document.getElementById("email").value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address");
        document.getElementById("email").focus();
        return false;
    }

    // Validate phone format
    const phone = document.getElementById("phone").value;
    const phoneRegex = /^(\+62|62|0)[0-9]{9,12}$/;
    if (!phoneRegex.test(phone)) {
        alert("Please enter a valid Indonesian phone number");
        document.getElementById("phone").focus();
        return false;
    }

    // Check payment method specific requirements
    if (paymentMethod === "bank_transfer") {
        const selectedBank = document.querySelector(
            'input[name="bank"]:checked'
        );
        if (!selectedBank) {
            alert("Please select a bank for transfer");
            return false;
        }
    } else if (paymentMethod === "e_wallet") {
        const selectedEwallet = document.querySelector(
            'input[name="ewallet"]:checked'
        );
        if (!selectedEwallet) {
            alert("Please select an e-wallet");
            return false;
        }
    }

    // Check terms agreement
    const termsChecked = document.getElementById("terms").checked;
    if (!termsChecked) {
        alert("Please agree to the terms and conditions");
        return false;
    }

    return true;
}

function preparePaymentData() {
    const bookingData = JSON.parse(sessionStorage.getItem("bookingData"));
    const paymentMethod = document.querySelector(
        'input[name="payment_method"]:checked'
    ).value;

    const data = {
        // Booking information
        checkin_date: bookingData.checkin,
        checkout_date: bookingData.checkout,
        persons: bookingData.persons,
        nights: bookingData.nights,

        // Customer information
        customer_name: document.getElementById("full-name").value,
        customer_email: document.getElementById("email").value,
        customer_phone: document.getElementById("phone").value,

        // Payment information
        payment_method: paymentMethod,
        room_price: bookingData.roomPrice,
        extra_person_price: bookingData.extraPersonPrice,
        tax_amount: bookingData.taxAmount,
        total_amount: bookingData.totalAmount,
    };

    // Add payment method specific data
    if (paymentMethod === "bank_transfer") {
        const selectedBank = document.querySelector(
            'input[name="bank"]:checked'
        );
        data.bank = selectedBank ? selectedBank.value : null;
    } else if (paymentMethod === "e_wallet") {
        const selectedEwallet = document.querySelector(
            'input[name="ewallet"]:checked'
        );
        data.ewallet = selectedEwallet ? selectedEwallet.value : null;
    }

    return data;
}

function handlePaymentSuccess(result) {
    console.log("Payment success:", result);

    // Clear booking data from sessionStorage
    sessionStorage.removeItem("bookingData");

    // Redirect to success page or show success message
    alert("Payment successful! Your booking has been confirmed.");

    // You can redirect to a success page or booking confirmation page
    window.location.href =
        "/booking-success?transaction_id=" + result.transaction_id;
}

function handlePaymentPending(result) {
    console.log("Payment pending:", result);

    alert("Payment is being processed. You will receive confirmation shortly.");

    // Redirect to pending page
    window.location.href =
        "/booking-pending?transaction_id=" + result.transaction_id;
}

function handlePaymentError(result) {
    console.error("Payment error:", result);

    alert("Payment failed. Please try again or contact customer service.");
}