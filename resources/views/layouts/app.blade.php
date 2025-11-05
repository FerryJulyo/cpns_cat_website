<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Ujian CPNS')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInRight {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.5s ease-out;
        }

        .animate-pulse-slow {
            animation: pulse 2s ease-in-out infinite;
        }

        .gradient-bg {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #4facfe);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }

        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">
    @auth
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span class="text-xl font-bold bg-gradient-to-r from-purple-600 to-blue-500 bg-clip-text text-transparent">
                            CPNS Exam
                        </span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-purple-600 px-3 py-2 rounded-md text-sm font-medium transition">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                    
                    <div class="relative group">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-purple-600 transition">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=667eea&color=fff" 
                                 class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 transition">
                                    <i class="fas fa-user mr-2"></i>Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white mt-20">
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="glassmorphism rounded-3xl p-12 animate-fadeIn">
            <div class="mb-8">
                <div class="inline-block w-20 h-20 bg-white rounded-full flex items-center justify-center mb-6 animate-pulse-slow">
                    <i class="fas fa-graduation-cap text-5xl bg-gradient-to-r from-purple-600 to-blue-500 bg-clip-text text-transparent"></i>
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">
                    Sistem Ujian CPNS
                </h1>
                <p class="text-xl text-white/90 mb-8">
                    Platform ujian online yang modern, aman, dan terpercaya untuk persiapan CPNS Anda
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="{{ route('login') }}" class="btn-primary text-white px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center justify-center space-x-2">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
                <a href="{{ route('register') }}" class="bg-white text-purple-600 px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center justify-center space-x-2 hover:shadow-xl transition-all hover:-translate-y-1">
                    <i class="fas fa-user-plus"></i>
                    <span>Daftar Sekarang</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="text-4xl mb-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Ujian Real-time</h3>
                    <p class="text-sm text-white/80">Timer otomatis dan sistem yang akurat</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="text-4xl mb-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Penilaian Otomatis</h3>
                    <p class="text-sm text-white/80">Hasil langsung setelah ujian selesai</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="text-4xl mb-3">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Aman & Terpercaya</h3>
                    <p class="text-sm text-white/80">Data Anda dijamin keamanannya</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}
</style>