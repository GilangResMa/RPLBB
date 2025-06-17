<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Bayang Brothers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
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
                <a href="about" class="flex items-center space-x-1 hover:text-red-200 border-b-2 border-white">
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

    <!-- Main Content -->
    <main class="bg-gray-50 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <div class="about-section">
                <!-- Description -->
                <div class="description bg-white p-8 rounded-lg shadow-sm mb-8">
                    <p class="text-gray-700 leading-relaxed text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>

                <!-- Map and Contact Section -->
                <div class="map-contact-section grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Map -->
                    <div class="map-container lg:col-span-2 bg-white rounded-lg shadow-sm overflow-hidden">
                        <div id="map" class="h-96">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.542907594448!2d110.36050931477389!3d-7.801194594368487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5797e5d49e77%3A0x3d4a4b7bb3db9f7e!2sTugu%20Yogyakarta!5e0!3m2!1sen!2sid!4v1640123456789!5m2!1sen!2sid" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="contact-info bg-gray-100 p-6 rounded-lg">
                        <h3 class="text-lg font-bold text-gray-800 mb-6">Contact :</h3>
                        
                        <div class="space-y-4">
                            <div class="contact-item">
                                <div class="flex items-center space-x-3">
                                    <i class="fab fa-whatsapp text-green-500 text-xl w-6"></i>
                                    <div>
                                        <div class="text-sm text-gray-600 font-medium">WA :</div>
                                        <a href="https://wa.me/6281392640030" target="_blank" class="text-gray-800 hover:text-red-600 transition-colors">
                                            +6281392640030
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="flex items-center space-x-3">
                                    <i class="fab fa-instagram text-pink-500 text-xl w-6"></i>
                                    <div>
                                        <div class="text-sm text-gray-600 font-medium">IG :</div>
                                        <a href="https://instagram.com/bayangbrothers" target="_blank" class="text-gray-800 hover:text-red-600 transition-colors">
                                            bayangbrothers
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-phone text-blue-500 text-xl w-6"></i>
                                    <div>
                                        <div class="text-sm text-gray-600 font-medium">Phone :</div>
                                        <a href="tel:+6281392640030" class="text-gray-800 hover:text-red-600 transition-colors">
                                            +6281392640030
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-map-marker-alt text-red-500 text-xl w-6 mt-1"></i>
                                    <div>
                                        <div class="text-sm text-gray-600 font-medium">Address :</div>
                                        <div class="text-gray-800 text-sm">
                                            Jl. Malioboro, Yogyakarta<br>
                                            Special Region of Yogyakarta<br>
                                            Indonesia
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Action Buttons -->
                        <div class="mt-6 space-y-3">
                            <a href="https://wa.me/6281392640030" target="_blank" class="w-full bg-green-500 text-white py-3 px-4 rounded-lg font-medium hover:bg-green-600 transition-colors flex items-center justify-center space-x-2">
                                <i class="fab fa-whatsapp"></i>
                                <span>Chat WhatsApp</span>
                            </a>
                            
                            <a href="https://instagram.com/bayangbrothers" target="_blank" class="w-full bg-pink-500 text-white py-3 px-4 rounded-lg font-medium hover:bg-pink-600 transition-colors flex items-center justify-center space-x-2">
                                <i class="fab fa-instagram"></i>
                                <span>Follow Instagram</span>
                            </a>
                        </div>
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