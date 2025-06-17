<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Bayang Brothers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <!-- Header -->
    <header class="bg-red-600 text-white px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <i class="fas fa-home text-xl"></i>
                <div>
                    <div class="font-bold text-lg">Bayang Brothers</div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="flex items-center space-x-6">
                <a href="/" class="flex items-center space-x-1 hover:text-red-200 border-b-2 border-white">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="detailkamar" class="flex items-center space-x-1 hover:text-red-200">
                    <i class="fas fa-bed"></i>
                    <span>Room</span>
                </a>
                <a href="about" class="flex items-center space-x-1 hover:text-red-200">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
                <a href="faq" class="flex items-center space-x-1 hover:text-red-200">
                    <i class="fas fa-question-circle"></i>
                    <span>FAQ</span>
                </a>
                <a href="login">
                <button class="bg-white text-red-600 px-4 py-2 rounded-full font-semibold hover:bg-gray-100">
                    Login
                </button>
                </a>
            </nav>
        </div>
    </header>

    <!-- Payment Content -->
    <main class="payment-content">
        <div class="container">
            <div class="payment-wrapper">
                <!-- Booking Summary -->
                <div class="booking-summary">
                    <h2><i class="fas fa-receipt"></i> Booking Summary</h2>
                    <div class="room-info">
                        <img src="{{ asset('img/kamar1.jpg') }}" alt="Room" class="room-image">
                        <div class="room-details">
                            <h3>Deluxe Room</h3>
                            <p><i class="fas fa-calendar"></i> <span id="booking-dates"></span></p>
                            <p><i class="fas fa-user"></i> <span id="booking-persons"></span></p>
                            <p><i class="fas fa-moon"></i> <span id="booking-nights"></span></p>
                        </div>
                    </div>
                    
                    <div class="price-breakdown">
                        <div class="price-item">
                            <span>Room Price</span>
                            <span id="room-price">Rp 0</span>
                        </div>
                        <div class="price-item">
                            <span>Extra Person</span>
                            <span id="extra-person-price">Rp 0</span>
                        </div>
                        <div class="price-item">
                            <span>Tax & Service (10%)</span>
                            <span id="tax-price">Rp 0</span>
                        </div>
                        <hr>
                        <div class="price-item total">
                            <span>Total Amount</span>
                            <span id="total-amount">Rp 0</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Form -->
                <div class="payment-form">
                    <h2><i class="fas fa-credit-card"></i> Payment Details</h2>
                    
                    <form id="payment-form">
                        <!-- Personal Information -->
                        <div class="form-section">
                            <h3>Personal Information</h3>
                            <div class="form-group">
                                <label for="full-name">Full Name</label>
                                <input type="text" id="full-name" name="full_name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="form-section">
                            <h3>Payment Method</h3>
                            <div class="payment-methods">
                                <div class="payment-option">
                                    <input type="radio" id="bank-transfer" name="payment_method" value="bank_transfer" checked>
                                    <label for="bank-transfer">
                                        <i class="fas fa-university"></i>
                                        Bank Transfer
                                    </label>
                                </div>
                                <div class="payment-option">
                                    <input type="radio" id="credit-card" name="payment_method" value="credit_card">
                                    <label for="credit-card">
                                        <i class="fas fa-credit-card"></i>
                                        Credit Card
                                    </label>
                                </div>
                                <div class="payment-option">
                                    <input type="radio" id="e-wallet" name="payment_method" value="e_wallet">
                                    <label for="e-wallet">
                                        <i class="fas fa-mobile-alt"></i>
                                        E-Wallet
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Details Section -->
                        <div id="bank-transfer-details" class="payment-details">
                            <h4>Bank Transfer Details</h4>
                            <div class="bank-options">
                                <div class="bank-option">
                                    <input type="radio" id="bca" name="bank" value="bca">
                                    <label for="bca">BCA - 1234567890</label>
                                </div>
                                <div class="bank-option">
                                    <input type="radio" id="mandiri" name="bank" value="mandiri">
                                    <label for="mandiri">Mandiri - 0987654321</label>
                                </div>
                                <div class="bank-option">
                                    <input type="radio" id="bni" name="bank" value="bni">
                                    <label for="bni">BNI - 1122334455</label>
                                </div>
                            </div>
                        </div>

                        <div id="credit-card-details" class="payment-details" style="display: none;">
                            <h4>Credit Card Information</h4>
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="expiry">Expiry Date</label>
                                    <input type="text" id="expiry" name="expiry" placeholder="MM/YY">
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="123">
                                </div>
                            </div>
                        </div>

                        <div id="e-wallet-details" class="payment-details" style="display: none;">
                            <h4>E-Wallet Options</h4>
                            <div class="ewallet-options">
                                <div class="ewallet-option">
                                    <input type="radio" id="gopay" name="ewallet" value="gopay">
                                    <label for="gopay">GoPay</label>
                                </div>
                                <div class="ewallet-option">
                                    <input type="radio" id="ovo" name="ewallet" value="ovo">
                                    <label for="ovo">OVO</label>
                                </div>
                                <div class="ewallet-option">
                                    <input type="radio" id="dana" name="ewallet" value="dana">
                                    <label for="dana">DANA</label>
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="form-section">
                            <div class="checkbox-group">
                                <input type="checkbox" id="terms" required>
                                <label for="terms">I agree to the <a href="#" target="_blank">Terms and Conditions</a></label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-actions">
                            <button type="button" class="btn-back" onclick="history.back()">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="submit" class="btn-pay">
                                <i class="fas fa-lock"></i> Secure Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <h3>Bayang Brothers</h3>
            <p>Bayang Brothers is a booking room service operating in Yogyakarta.</p>
            <div class="social-links">
                <a href="#"><i class="fas fa-phone"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright @2025 Bayang Brothers</p>
        </div>
    </footer>

    @livewireScripts
</body>

</html>