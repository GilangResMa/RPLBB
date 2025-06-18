<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Bayang Brothers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 min-h-screen">
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
            <nav class="bg-red-600 flex items-center space-x-6">
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
                
                <!-- User Menu -->
                <div class="relative">
                    <button class="flex items-center space-x-2 bg-white text-red-600 px-4 py-2 rounded-full font-semibold hover:bg-gray-100">
                        <i class="fas fa-user"></i>
                        <span>{{ Auth::user()->namaPelanggan ?? 'User' }}</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden" id="userDropdown">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            <i class="fas fa-user mr-2"></i>Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            <i class="fas fa-history mr-2"></i>My Bookings
                        </a>
                        <hr class="my-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex items-center justify-center min-h-screen -mt-20 pt-20">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <div class="text-center mb-8">
                <div class="w-24 h-24 bg-red-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user text-white text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">My Profile</h2>
                <p class="text-gray-600">Manage your account information</p>
            </div>

            <!-- Profile Information -->
            <div class="space-y-6">
                <!-- Personal Information Section -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-user mr-2 text-red-600"></i>
                        Personal Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <div class="w-full px-4 py-3 bg-gray-200 rounded-lg text-gray-700">
                                {{ Auth::user()->namaPelanggan ?? 'N/A' }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <div class="w-full px-4 py-3 bg-gray-200 rounded-lg text-gray-700">
                                {{ Auth::user()->emailPelanggan ?? 'N/A' }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <div class="w-full px-4 py-3 bg-gray-200 rounded-lg text-gray-700">
                                {{ Auth::user()->kontakPelanggan ?? 'N/A' }}
                            </div>
                        </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <a href="#" 
                       class="flex-1 bg-red-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-red-700 transition duration-200 text-center">
                        <i class="fas fa-edit mr-2"></i>Edit Profile
                    </a>
                    <a href="#" 
                       class="flex-1 bg-gray-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-700 transition duration-200 text-center">
                        <i class="fas fa-history mr-2"></i>View Bookings
                    </a>
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

    <script>
        // Toggle dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            const userButton = document.querySelector('button[id="userDropdown"]').previousElementSibling;
            const dropdown = document.getElementById('userDropdown');
            
            userButton.addEventListener('click', function() {
                dropdown.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!userButton.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>

    @livewireScripts
</body>

</html>