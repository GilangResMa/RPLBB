<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayang Brothers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/detailkamar.css') }}">
    {{-- @vite(['resources/css/app.css', 'resources/css/detailkamar.css', 'resources/js/app.js']) --}}
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
                <a href="/" class="flex items-center space-x-1 hover:text-red-200">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="detailkamar" class="flex items-center space-x-1 hover:text-red-200 border-b-2 border-white">
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

    <!-- Main Content -->
    <main class="main-content bg-gray-50 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <div class="room-detail bg-white rounded-lg shadow-lg overflow-hidden mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Image Gallery -->
                    <div class="image-gallery">
                        <div class="main-image relative">
                            <img src="{{ asset('img/kamar1.jpg') }}" alt="Kamar" class="w-full h-80 object-cover">
                        </div>
                        <div class="thumbnail-grid grid grid-cols-2 gap-2 mt-2">
                            <img src="{{ asset('img/kamar2.jpg') }}" alt="Kamar 2" class="w-full h-32 object-cover rounded cursor-pointer hover:opacity-80">
                            <img src="{{ asset('img/meja.jpg') }}" alt="Meja" class="w-full h-32 object-cover rounded cursor-pointer hover:opacity-80">
                            <img src="{{ asset('img/toilet.jpg') }}" alt="Toilet" class="w-full h-32 object-cover rounded cursor-pointer hover:opacity-80">
                            <img src="{{ asset('img/wc.jpg') }}" alt="WC" class="w-full h-32 object-cover rounded cursor-pointer hover:opacity-80">
                        </div>
                    </div>

                    <!-- Room Info -->
                    <div class="room-info p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Fasilitas Kamar :</h2>

                        <div class="facilities grid grid-cols-2 gap-4 mb-6">
                            <div class="facility-column">
                                <ul class="space-y-2">
                                    <li class="flex items-center text-gray-700">
                                        <span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>
                                        Queen Bed
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>
                                        TV
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>
                                        AC
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>
                                        Kamar Mandi Dalam
                                    </li>
                                </ul>
                            </div>
                            <div class="facility-column">
                                <ul class="space-y-2">
                                    <li class="flex items-center text-gray-700">
                                        <span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>
                                        Lemari
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>
                                        Meja Rias
                                    </li>
                                    <li class="flex items-center text-gray-700">
                                        <span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>
                                        Air Panas
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="description mb-6">
                            <p class="text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>

                        <div class="price">
                            <div class="text-lg font-bold text-gray-800">
                                <span class="price-label">Price: </span>
                                <span id="total-price" class="text-red-600">Rp 0</span>
                            </div>
                            <div id="price-details" style="display: none;" class="mt-2">
                                <small id="nights-info" class="text-gray-500"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Section -->
            <div class="booking-section bg-white rounded-lg shadow-lg p-6">
                <div class="booking-inputs grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                    <div class="input-group">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-calendar text-red-600 mr-2"></i>
                            Check In - Check Out
                        </label>
                        <div class="date-inputs flex items-center">
                            <input type="date" id="checkin" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                            <span class="text-gray-500">-</span>
                            <input type="date" id="checkout" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user text-red-600 mr-2"></i>
                            Person
                        </label>
                        <select id="persons" class="w-75 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                            <option value="1">1 Person</option>
                            <option value="2">2 Persons</option>
                            <option value="3">3 Persons</option>
                            <option value="4">4 Persons</option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contact Admin</label>
                        <button class="w-full px-3 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Cari Admin
                        </button>
                    </div>
                    
                    <div class="input-group">
                        <a href="/payment">
                            <button class="booking-btn w-full px-6 py-3 bg-red-600 text-white rounded-md font-semibold hover:bg-red-700 transition-colors" onclick="calculatePrice()">
                                Booking Now
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-red-600 text-white py-6 mt-auto">
        <div class="text-center">
            <h3 class="font-bold text-lg mb-2">Bayang Brothers</h3>
            <p class="text-sm mb-4">Bayang Brothers is a booking room service operating in Yogyakarta.</p>
            
            <!-- Social Media Icons -->
            <div class="flex justify-center space-x-4 mb-4">
                <a href="tel:+6281392640030" class="text-white hover:text-red-200">
                    <i class="fas fa-phone"></i>
                </a>
                <a href="https://instagram.com/bayangbrothers" class="text-white hover:text-red-200">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/6281392640030" class="text-white hover:text-red-200">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
            <p class="text-xs mt-4">Copyright ©2025 Bayang Brothers</p>
        </div>
    </footer>

    <script src="{{ asset('js/detailkamar.js') }}"></script>
    @livewireScripts
</body>

</html>