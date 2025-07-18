<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayang Brothers</title>
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
                <button class="bg-white text-red-600 px-4 py-2 rounded-full font-semibold hover:bg-gray-100">
                    Login
                </button>

            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex items-center justify-center min-h-screen -mt-20 pt-20">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Login</h2>

            <form class="space-y-4" method="POST" action="{{ route('custlogin') }}">
                @csrf
                <!-- Email Field -->
                <div>
                    <input name="email" type="email" placeholder="Email"
                        class="w-full px-4 py-3 bg-gray-200 border-none rounded-lg text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500"
                        required>
                </div>

                <!-- Password Field -->
                <div>
                    <input name="password" type="password" placeholder="Password"
                        class="w-full px-4 py-3 bg-gray-200 border-none rounded-lg text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500"
                        required>
                </div>

                <!-- Sign In Button -->
                <button type="submit"
                    class="w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-200 mt-6">
                    Sign In
                </button>

                <!-- Sign Up Link -->
                <p class="text-center text-gray-600 mt-4">
                    Don't Have an Account?
                    <a href="register" class="text-gray-800 font-semibold hover:text-red-600">Sign Up</a>
                </p>
            </form>
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
    @livewireStyles
</body>

</html>
