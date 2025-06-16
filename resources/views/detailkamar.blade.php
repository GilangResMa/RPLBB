<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayang Brothers</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/detailkamar.css', 'resources/js/detailkamar.js'])
    @livewireStyles
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <i class="fas fa-home"></i>
                <span>Bayang Brothers</span>
            </div>
            <nav class="nav">
                <a href="/" class="nav-link">
                    <i class="fas fa-home"></i> Home
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-bed"></i> Room
                </a>
                <a href="/about" class="nav-link">
                    <i class="fas fa-info-circle"></i> About
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-question-circle"></i> FAQ
                </a>
            </nav>
            <button class="login-btn">Login</button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="room-detail">
                <!-- Image Gallery -->
                <div class="image-gallery">
                    <div class="main-image">
                        <img src="{{ asset('img/kamar1.jpg') }}"  alt="Kamar">
                    </div>
                    <div class="thumbnail-grid">
                        <img src="{{ asset('img/kamar2.jpg') }}" alt="Kamar 2">
                        <img src="{{ asset('img/meja.jpg') }}" alt="Meja">
                        <img src="{{ asset('img/toilet.jpg') }}" alt="Toilet">
                        <img src="{{ asset('img/wc.jpg') }}" alt="WC">
                    </div>
                </div>

                <!-- Room Info -->
                <div class="room-info">
                    <h2>Fasilitas Kamar :</h2>
                    
                    <div class="facilities">
                        <div class="facility-column">
                            <ul>
                                <li>Queen Bed</li>
                                <li>TV</li>
                                <li>AC</li>
                                <li>Kamar Mandi Dalam</li>
                            </ul>
                        </div>
                        <div class="facility-column">
                            <ul>
                                <li>Lemari</li>
                                <li>Meja Rias</li>
                                <li>Air Panas</li>
                            </ul>
                        </div>
                    </div>

                    <div class="description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <div class="price">
    <span class="price-label">Price: </span>
    <span id="total-price">Rp 0</span>
    <div id="price-details" style="display: none;">
        <small id="nights-info"></small>
    </div>
</div>
                </div>
            </div>

            <!-- Booking Section -->
<div class="booking-section">
    <div class="booking-inputs">
        <div class="input-group">
            <i class="fas fa-calendar"></i>
            <div class="date-inputs">
                <input type="date" id="checkin" placeholder="Check In">
                <span class="date-separator">-</span>
                <input type="date" id="checkout" placeholder="Check Out">
            </div>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <select id="persons">
                <option value="1">1 Person</option>
                <option value="2">2 Persons</option>
                <option value="3">3 Persons</option>
                <option value="4">4 Persons</option>
            </select>
        </div>
        <div class="input-group">
            <span>Cari Admin</span>
        </div>
        <button class="booking-btn" onclick="calculatePrice()">Booking Now</button>
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
            <div class="footer-nav">
                <a href="#">Home</a>
                <a href="#">Room</a>
                <a href="#">About</a>
                <a href="#">FAQ</a>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright @2025 Bayang Brothers</p>
        </div>
    </footer>
    @livewireStyles
</body>
</html>