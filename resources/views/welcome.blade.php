@extends('layouts.app')

@section('title', 'Selamat Datang - Sistem Ujian CPNS')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 flex items-center justify-center relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-40 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-6xl mx-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Left Side - Hero Content -->
            <div class="text-white">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold">CPNS Exam System</span>
                </div>
                
                <h1 class="text-4xl lg:text-5xl font-bold mb-4 leading-tight">
                    Sistem Ujian CPNS<br>
                    <span class="text-yellow-300">Computer Assisted Test</span>
                </h1>
                
                <p class="text-lg text-blue-100 mb-8 leading-relaxed">
                    Platform ujian CPNS online terpercaya untuk membantu Anda meraih impian menjadi Aparatur Sipil Negara. 
                    Tes Kompetensi Dasar dengan sistem computer-based test yang modern dan terstandarisasi.
                </p>

                <!-- Features List -->
                <div class="space-y-3 mb-8">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-check-circle text-green-300"></i>
                        <span class="text-blue-100">Soal terupdate sesuai kisi-kisi terbaru</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-check-circle text-green-300"></i>
                        <span class="text-blue-100">Simulasi ujian dengan timer real-time</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-check-circle text-green-300"></i>
                        <span class="text-blue-100">Analisis hasil dan rekomendasi belajar</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300 text-center">
                        Mulai Ujian
                    </a>
                    <a href="{{ route('register') }}" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white/10 transition duration-300 text-center">
                        Daftar Akun
                    </a>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Login ke Akun Anda</h2>
                    <p class="text-gray-600 mt-2">Masuk untuk mengakses sistem ujian</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="admin@cintasatwa.com"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                            required
                        >
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password Anda"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                            required
                        >
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                        </div>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Lupa password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition duration-300 shadow-lg"
                    >
                        Masuk
                    </button>
                </form>

                <!-- Demo Account Info -->
                <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <p class="text-sm text-blue-800 text-center">
                        <strong>Demo Account:</strong><br>
                        demo@cpns.id / password123
                    </p>
                </div>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:text-blue-500 transition duration-300">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-8">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Brand -->
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-blue-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold">CPNS Exam System</span>
                </div>
                <p class="text-gray-400 mb-4">
                    Platform ujian CPNS online terpercaya untuk membantu Anda meraih impian menjadi Aparatur Sipil Negara.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white transition duration-300">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Panduan</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">FAQ</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                <ul class="space-y-2 text-gray-400">
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-2 w-4"></i>
                        info@cpnsexam.id
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-2 w-4"></i>
                        +62 821 xxxx xxxx
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2025 CPNS Exam System. All rights reserved.</p>
        </div>
    </div>
</footer>