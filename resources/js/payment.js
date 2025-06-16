document.addEventListener('DOMContentLoaded', function() {
    // Get booking data from URL parameters or localStorage
    loadBookingData();
    
    // Payment method toggle
    setupPaymentMethodToggle();
    
    // Form submission
    setupFormSubmission();
    
    // Calculate prices
    calculatePrices();
});

function loadBookingData() {
    // Get data from URL parameters or localStorage
    const urlParams = new URLSearchParams(window.location.search);
    const checkin = urlParams.get('checkin') || localStorage.getItem('checkin');
    const checkout = urlParams.get('checkout') || localStorage.getItem('checkout');
    const persons = urlParams.get('persons') || localStorage.getItem('persons') || 1;
    
    if (checkin && checkout) {
        const checkinDate = new Date(checkin);
        const checkoutDate = new Date(checkout);
        const nights = Math.ceil((checkoutDate - checkinDate) / (1000 * 60 * 60 * 24));
        
        // Update booking summary
        document.getElementById('booking-dates').textContent = 
            `${formatDate(checkinDate)} - ${formatDate(checkoutDate)}`;
        document.getElementById('booking-persons').textContent = `${persons} Person(s)`;
        document.getElementById('booking-nights').textContent = `${nights} Night(s)`;
        
        // Store data for calculations
        window.bookingData = {
            checkin,
            checkout,
            persons: parseInt(persons),
            nights
        };
    }
}

function setupPaymentMethodToggle() {
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    const bankDetails = document.getElementById('bank-transfer-details');
    const cardDetails = document.getElementById('credit-card-details');
    const ewalletDetails = document.getElementById('e-wallet-details');
    
    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            // Hide all details
            bankDetails.style.display = 'none';
            cardDetails.style.display = 'none';
            ewalletDetails.style.display = 'none';
            
            // Show selected method details
            switch(this.value) {
                case 'bank_transfer':
                    bankDetails.style.display = 'block';
                    break;
                case 'credit_card':
                    cardDetails.style.display = 'block';
                    break;
                case 'e_wallet':
                    ewalletDetails.style.display = 'block';
                    break;
            }
        });
    });
}

function setupFormSubmission() {
    const form = document.getElementById('payment-form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        if (!validateForm()) {
            return;
        }
        
        // Show loading state
        const submitBtn = document.querySelector('.btn-pay');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        submitBtn.disabled = true;
        
        // Simulate payment processing
        setTimeout(() => {
            // Redirect to success page or show success message
            alert('Payment successful! You will receive a confirmation email shortly.');
            window.location.href = '/booking-success';
        }, 2000);
    });
}

function validateForm() {
    const requiredFields = document.querySelectorAll('input[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.style.borderColor = '#e74c3c';
            isValid = false;
        } else {
            field.style.borderColor = '#ddd';
        }
    });
    
    // Check if payment method is selected
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
    if (!paymentMethod) {
        alert('Please select a payment method');
        isValid = false;
    }
    
    return isValid;
}

function calculatePrices() {
    if (!window.bookingData) return;
    
    const PRICE_PER_NIGHT = 500000;
    const EXTRA_PERSON_PRICE = 100000;
    const TAX_RATE = 0.1;
    
    const { nights, persons } = window.bookingData;
    
    // Calculate prices
    const roomPrice = nights * PRICE_PER_NIGHT;
    const extraPersonPrice = persons > 2 ? (persons - 2) * EXTRA_PERSON_PRICE * nights : 0;
    const subtotal = roomPrice + extraPersonPrice;
    const taxPrice = subtotal * TAX_RATE;
    const totalAmount = subtotal + taxPrice;
    
    // Update display
    document.getElementById('room-price').textContent = formatCurrency(roomPrice);
    document.getElementById('extra-person-price').textContent = formatCurrency(extraPersonPrice);
    document.getElementById('tax-price').textContent = formatCurrency(taxPrice);
    document.getElementById('total-amount').textContent = formatCurrency(totalAmount);
}

function formatDate(date) {
    return date.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'short',
        year: 'numeric'
    });
}

function formatCurrency(amount) {
    return 'Rp ' + amount.toLocaleString('id-ID');
}