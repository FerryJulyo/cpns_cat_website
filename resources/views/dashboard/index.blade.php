@extends('layouts.app')

@section('title', 'Dashboard - Sistem Ujian CPNS')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-purple-600 to-blue-500 rounded-2xl shadow-xl p-8 mb-8 text-white animate-fadeIn">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">
                    Selamat Datang, {{ auth()->user()->name }}! 👋
                </h1>
                <p class="text-white/90">
                    Siap untuk mengikuti ujian hari ini? Pilih ujian yang ingin Anda ikuti di bawah ini.
                </p>
            </div>
            <div class="hidden md:block">
                <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                    <i class="fas fa-user-graduate text-5xl"></i>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg animate-slideInRight">
        <div class="flex">
            <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
            <p class="ml-3 text-sm text-green-700">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
                <span class="text-3xl font-bold text-blue-600">{{ $exams->count() }}</span>
            </div>
            <h3 class="text-gray-600 font-medium">Ujian Tersedia</h3>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <span class="text-3xl font-bold text-green-600">{{ $userSessions->where('status', 'completed')->count() }}</span>
            </div>
            <h3 class="text-gray-600 font-medium">Ujian Selesai</h3>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-star text-purple-600 text-xl"></i>
                </div>
                <span class="text-3xl font-bold text-purple-600">
                    {{ $userSessions->where('status', 'completed')->avg('score') ? number_format($userSessions->where('status', 'completed')->avg('score'), 0) : 0 }}
                </span>
            </div>
            <h3 class="text-gray-600 font-medium">Rata-rata Skor</h3>
        </div>
    </div>

    <!-- Available Exams -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">
                <i class="fas fa-book-open mr-2 text-purple-600"></i>
                Daftar Ujian
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($exams as $exam)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                <div class="h-32 bg-gradient-to-r {{ $exam->type == 'TWK' ? 'from-blue-500 to-blue-600' : ($exam->type == 'TIU' ? 'from-green-500 to-green-600' : 'from-purple-500 to-purple-600') }} flex items-center justify-center">
                    <div class="text-center text-white">
                        <i class="fas fa-graduation-cap text-5xl mb-2"></i>
                        <span class="text-xs font-semibold bg-white/20 px-3 py-1 rounded-full">{{ $exam->type }}</span>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $exam->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $exam->description }}</p>
                    
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-clock w-5 text-purple-500"></i>
                            <span>{{ $exam->duration_minutes }} menit</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-question-circle w-5 text-purple-500"></i>
                            <span>{{ $exam->total_questions }} soal</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-chart-line w-5 text-purple-500"></i>
                            <span>Passing Grade: {{ $exam->passing_grade }}</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('exam.show', $exam->id) }}" class="btn-primary block text-center py-3 px-4 rounded-lg text-white font-semibold">
                        <i class="fas fa-play-circle mr-2"></i>Mulai Ujian
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada ujian tersedia</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Recent Exam History -->
    @if($userSessions->count() > 0)
    <div>
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            <i class="fas fa-history mr-2 text-purple-600"></i>
            Riwayat Ujian Terakhir
        </h2>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ujian</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($userSessions as $session)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center mr-3">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $session->exam->title }}</div>
                                        <div class="text-xs text-gray-500">{{ $session->exam->type }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $session->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($session->status == 'completed')
                                <span class="text-lg font-bold text-purple-600">{{ $session->score }}</span>
                                @else
                                <span class="text-sm text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($session->status == 'completed')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i> Selesai
                                </span>
                                @elseif($session->status == 'ongoing')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-1"></i> Berlangsung
                                </span>
                                @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i> Expired
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if($session->status == 'completed')
                                <a href="{{ route('exam.result', $session->id) }}" class="text-purple-600 hover:text-purple-900 font-medium">
                                    <i class="fas fa-eye mr-1"></i>Lihat Detail
                                </a>
                                @elseif($session->status == 'ongoing')
                                <a href="{{ route('exam.take', $session->id) }}" class="text-green-600 hover:text-green-900 font-medium">
                                    <i class="fas fa-play-circle mr-1"></i>Lanjutkan
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection