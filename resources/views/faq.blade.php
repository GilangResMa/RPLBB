<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Bayang Brothers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
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
                    <div class="font-bold text-lg">Bayang</div>
                    <div class="text-sm">Brothers</div>
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
                <a href="faq" class="flex items-center space-x-1 hover:text-red-200 border-b-2 border-white">
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

    <!-- Main Content -->
    <main class="bg-gray-50 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <div class="faq-section">
                <h1 class="page-title text-2xl font-bold text-gray-800 mb-8 text-left">Frequently Asked Question</h1>
                
                <div class="faq-grid grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="faq-question text-lg font-semibold text-gray-800 mb-3">Bagaimana cara melakukan reservasi?</h3>
                        <p class="faq-answer text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="faq-question text-lg font-semibold text-gray-800 mb-3">Apa saja fasilitas yang tersedia?</h3>
                        <p class="faq-answer text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="faq-question text-lg font-semibold text-gray-800 mb-3">Bagaimana kebijakan pembatalan?</h3>
                        <p class="faq-answer text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="faq-item bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="faq-question text-lg font-semibold text-gray-800 mb-3">Metode pembayaran apa saja yang diterima?</h3>
                        <p class="faq-answer text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="faq-item bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="faq-question text-lg font-semibold text-gray-800 mb-3">Apakah ada layanan antar jemput?</h3>
                        <p class="faq-answer text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="faq-item bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="faq-question text-lg font-semibold text-gray-800 mb-3">Bagaimana menghubungi customer service?</h3>
                        <p class="faq-answer text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
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
            <div class="footer-nav flex justify-center space-x-6 mb-4">
                <a href="/" class="text-red-100 hover:text-white">Home</a>
                <a href="/detailkamar" class="text-red-100 hover:text-white">Room</a>
                <a href="/about" class="text-red-100 hover:text-white">About</a>
                <a href="/faq" class="text-red-100 hover:text-white">FAQ</a>
            </div>
            <div class="copyright border-t border-red-500 pt-4">
                <p class="text-red-100">Copyright @2025 Bayang Brothers</p>
            </div>
        </div>
    </footer>
    @livewireScripts
</body>
</html>