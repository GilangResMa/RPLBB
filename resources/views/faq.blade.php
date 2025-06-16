<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Bayang Brothers</title>
    <link rel="stylesheet" href="faq-style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/faq.css', 'resources/js/app.js'])
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
                <a href="#" class="nav-link">
                    <i class="fas fa-info-circle"></i> About
                </a>
                <a href="#" class="nav-link active">
                    <i class="fas fa-question-circle"></i> FAQ
                </a>
            </nav>
            <button class="login-btn">Login</button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="faq-section">
                <h1 class="page-title">Frequently Asked Question</h1>
                
                <div class="faq-grid">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item">
                        <h3 class="faq-question">Pertanyaan</h3>
                        <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item">
                        <h3 class="faq-question">Pertanyaan</h3>
                        <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item">
                        <h3 class="faq-question">Pertanyaan</h3>
                        <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="faq-item">
                        <h3 class="faq-question">Pertanyaan</h3>
                        <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="faq-item">
                        <h3 class="faq-question">Pertanyaan</h3>
                        <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="faq-item">
                        <h3 class="faq-question">Pertanyaan</h3>
                        <p class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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