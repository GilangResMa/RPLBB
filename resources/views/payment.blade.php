<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Bayang Brothers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @livewireStyles
    
    <!-- Midtrans Snap Script -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>

<body class="bg-gray-50">
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
                <a href="/" class="flex items-center space-x-1 hover:text-red-200">
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
    <main class="min-h-screen py-8">
        <div class="container mx-auto px-4">
            <div class="payment-wrapper grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Booking Summary -->
                <div class="booking-summary bg-white rounded-lg shadow-lg p-6 h-fit sticky top-24">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 border-b-2 border-red-600 pb-2">
                        <i class="fas fa-receipt text-red-600 mr-2"></i> Booking Summary
                    </h2>
                    
                    <div class="room-info flex gap-4 mb-6">
                        <img src="{{ asset('img/kamar1.jpg') }}" alt="Room" class="w-20 h-20 object-cover rounded-lg">
                        <div class="room-details flex-1">
                            <h3 class="font-semibold text-gray-800 mb-2">Deluxe Room</h3>
                            <p class="text-sm text-gray-600 mb-1"><i class="fas fa-calendar text-red-600 mr-2"></i> <span id="booking-dates">-</span></p>
                            <p class="text-sm text-gray-600 mb-1"><i class="fas fa-user text-red-600 mr-2"></i> <span id="booking-persons">-</span></p>
                            <p class="text-sm text-gray-600"><i class="fas fa-moon text-red-600 mr-2"></i> <span id="booking-nights">-</span></p>
                        </div>
                    </div>
                    
                    <div class="price-breakdown space-y-3">
                        <div class="price-item flex justify-between">
                            <span class="text-gray-600">Room Price</span>
                            <span id="room-price" class="font-medium">Rp 0</span>
                        </div>
                        <div class="price-item flex justify-between">
                            <span class="text-gray-600">Extra Person</span>
                            <span id="extra-person-price" class="font-medium">Rp 0</span>
                        </div>
                        <div class="price-item flex justify-between">
                            <span class="text-gray-600">Tax & Service (10%)</span>
                            <span id="tax-price" class="font-medium">Rp 0</span>
                        </div>
                        <hr class="my-4">
                        <div class="price-item flex justify-between text-lg font-bold text-gray-800">
                            <span>Total Amount</span>
                            <span id="total-amount" class="text-red-600">Rp 0</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Form -->
                <div class="payment-form lg:col-span-2 bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 border-b-2 border-red-600 pb-2">
                        <i class="fas fa-credit-card text-red-600 mr-2"></i> Payment Details
                    </h2>
                    
                    <form id="payment-form" class="space-y-6">
                        <!-- Personal Information -->
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Personal Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="form-group">
                                    <label for="full-name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" id="full-name" name="full_name" required 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" id="email" name="email" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="form-section">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Payment Method</h3>
                            <div class="payment-methods grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="payment-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:border-red-500 transition-colors">
                                    <input type="radio" id="bank-transfer" name="payment_method" value="bank_transfer" checked class="hidden">
                                    <label for="bank-transfer" class="flex items-center space-x-3 cursor-pointer">
                                        <i class="fas fa-university text-blue-600 text-xl"></i>
                                        <span class="font-medium">Bank Transfer</span>
                                    </label>
                                </div>
                                <div class="payment-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:border-red-500 transition-colors">
                                    <input type="radio" id="credit-card" name="payment_method" value="credit_card" class="hidden">
                                    <label for="credit-card" class="flex items-center space-x-3 cursor-pointer">
                                        <i class="fas fa-credit-card text-green-600 text-xl"></i>
                                        <span class="font-medium">Credit Card</span>
                                    </label>
                                </div>
                                <div class="payment-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:border-red-500 transition-colors">
                                    <input type="radio" id="e-wallet" name="payment_method" value="e_wallet" class="hidden">
                                    <label for="e-wallet" class="flex items-center space-x-3 cursor-pointer">
                                        <i class="fas fa-mobile-alt text-purple-600 text-xl"></i>
                                        <span class="font-medium">E-Wallet</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Details Section -->
                        <div id="bank-transfer-details" class="payment-details bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-gray-700 mb-3">Select Bank</h4>
                            <div class="bank-options space-y-2">
                                <div class="bank-option border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-white hover:border-red-500 transition-colors">
                                    <input type="radio" id="bca" name="bank" value="bca" class="mr-3">
                                    <label for="bca" class="cursor-pointer flex items-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA" class="w-8 h-8 mr-3">
                                        <span>BCA - 1234567890</span>
                                    </label>
                                </div>
                                <div class="bank-option border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-white hover:border-red-500 transition-colors">
                                    <input type="radio" id="mandiri" name="bank" value="mandiri" class="mr-3">
                                    <label for="mandiri" class="cursor-pointer flex items-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" alt="Mandiri" class="w-8 h-8 mr-3">
                                        <span>Mandiri - 0987654321</span>
                                    </label>
                                </div>
                                <div class="bank-option border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-white hover:border-red-500 transition-colors">
                                    <input type="radio" id="bni" name="bank" value="bni" class="mr-3">
                                    <label for="bni" class="cursor-pointer flex items-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/en/2/27/BNI_logo.svg" alt="BNI" class="w-8 h-8 mr-3">
                                        <span>BNI - 1122334455</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="credit-card-details" class="payment-details bg-gray-50 p-4 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-700 mb-3">Credit Card Information</h4>
                            <div class="space-y-4">
                                <div class="form-group">
                                    <label for="card-number" class="block text-sm font-medium text-gray-700 mb-2">Card Number</label>
                                    <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9012 3456"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="form-group">
                                        <label for="expiry" class="block text-sm font-medium text-gray-700 mb-2">Expiry Date</label>
                                        <input type="text" id="expiry" name="expiry" placeholder="MM/YY"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    </div>
                                    <div class="form-group">
                                        <label for="cvv" class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="123"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="e-wallet-details" class="payment-details bg-gray-50 p-4 rounded-lg hidden">
                            <h4 class="font-semibold text-gray-700 mb-3">Select E-Wallet</h4>
                            <div class="ewallet-options grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div class="ewallet-option border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-white hover:border-red-500 transition-colors">
                                    <input type="radio" id="gopay" name="ewallet" value="gopay" class="hidden">
                                    <label for="gopay" class="cursor-pointer flex items-center justify-center space-x-2">
                                        <img src="https://logos-world.net/wp-content/uploads/2020/09/Gojek-Logo.png" alt="GoPay" class="w-8 h-8">
                                        <span>GoPay</span>
                                    </label>
                                </div>
                                <div class="ewallet-option border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-white hover:border-red-500 transition-colors">
                                    <input type="radio" id="ovo" name="ewallet" value="ovo" class="hidden">
                                    <label for="ovo" class="cursor-pointer flex items-center justify-center space-x-2">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo_purple.svg" alt="OVO" class="w-8 h-8">
                                        <span>OVO</span>
                                    </label>
                                </div>
                                <div class="ewallet-option border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-white hover:border-red-500 transition-colors">
                                    <input type="radio" id="dana" name="ewallet" value="dana" class="hidden">
                                    <label for="dana" class="cursor-pointer flex items-center justify-center space-x-2">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="DANA" class="w-8 h-8">
                                        <span>DANA</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="form-section">
                            <div class="flex items-start space-x-3">
                                <input type="checkbox" id="terms" required class="mt-1">
                                <label for="terms" class="text-sm text-gray-600">
                                    I agree to the <a href="#" target="_blank" class="text-red-600 hover:underline">Terms and Conditions</a> and <a href="#" target="_blank" class="text-red-600 hover:underline">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-actions flex flex-col md:flex-row gap-4 justify-between">
                            <button type="button" class="btn-back px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors flex items-center justify-center space-x-2" onclick="history.back()">
                                <i class="fas fa-arrow-left"></i>
                                <span>Back</span>
                            </button>
                            <button type="submit" class="btn-pay flex-1 px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center space-x-2">
                                <i class="fas fa-lock"></i>
                                <span>Secure Payment</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-red-600 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-xl font-bold mb-2">Bayang Brothers</h3>
            <p class="text-red-100 mb-4">Bayang Brothers is a booking room service operating in Yogyakarta.</p>
            <div class="social-links flex justify-center space-x-4 mb-4">
                <a href="tel:+6281392640030" class="text-white hover:text-red-200 text-xl">
                    <i class="fas fa-phone"></i>
                </a>
                <a href="https://instagram.com/bayangbrothers" target="_blank" class="text-white hover:text-red-200 text-xl">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/6281392640030" target="_blank" class="text-white hover:text-red-200 text-xl">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
            <div class="copyright border-t border-red-500 pt-4">
                <p class="text-red-100">Copyright @2025 Bayang Brothers</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/payment.js') }}"></script>
    @livewireScripts
</body>

</html>