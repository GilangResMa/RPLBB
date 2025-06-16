<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayang Brothers</title>
    <link rel="stylesheet" href="about-style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/about.css', 'resources/js/app.js'])
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
                <a href="#" class="nav-link">
                    <i class="fas fa-home"></i> Home
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-bed"></i> Room
                </a>
                <a href="#" class="nav-link active">
                    <i class="fas fa-info-circle"></i> About
                </a>
                <a href="/faq" class="nav-link">
                    <i class="fas fa-question-circle"></i> FAQ
                </a>
            </nav>
            <button class="login-btn">Login</button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="about-section">
                <!-- Description -->
                <div class="description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <!-- Map and Contact Section -->
                <div class="map-contact-section">
                    <!-- Map -->
                    <div class="map-container">
                        <div id="map">
                            <!-- Google Maps akan dimuat di sini -->
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9993374634417!2d110.36311731477392!3d-7.797068194374034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x6b1b1e1b1e1b1e1b!2sYogyakarta%2C%20Special%20Region%20of%20Yogyakarta!5e0!3m2!1sen!2sid!4v1640123456789!5m2!1sen!2sid" 
                                width="100%" 
                                height="600" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="contact-info">
                        <h3>Contact :</h3>
                        <div class="contact-item">
                            <span class="contact-label">WA :</span>
                            <span class="contact-value">+6281392640030</span>
                        </div>
                        <div class="contact-item">
                            <span class="contact-label">IG :</span>
                            <span class="contact-value">bayangbrothers</span>
                        </div>
                    </div>
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
                <a href="tel:+6281392640030"><i class="fas fa-phone"></i></a>
                <a href="https://instagram.com/bayangbrothers" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/6281392640030" target="_blank"><i class="fab fa-whatsapp"></i></a>
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