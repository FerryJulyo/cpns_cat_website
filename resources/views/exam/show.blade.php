@extends('layouts.app')

@section('title', $exam->title . ' - Sistem Ujian CPNS')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="{{ route('dashboard') }}" class="text-purple-600 hover:text-purple-700 font-medium inline-flex items-center transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fadeIn">
        <div class="h-48 bg-gradient-to-r {{ $exam->type == 'TWK' ? 'from-blue-500 to-blue-600' : ($exam->type == 'TIU' ? 'from-green-500 to-green-600' : 'from-purple-500 to-purple-600') }} flex items-center justify-center">
            <div class="text-center text-white">
                <i class="fas fa-graduation-cap text-7xl mb-4 animate-pulse-slow"></i>
                <h1 class="text-4xl font-bold">{{ $exam->title }}</h1>
                <span class="inline-block mt-3 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold">
                    {{ $exam->type }}
                </span>
            </div>
        </div>

        <div class="p-8">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Deskripsi Ujian</h2>
                <p class="text-gray-600 leading-relaxed">{{ $exam->description }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <div>
                            <div class="text-sm text-blue-600 font-medium">Durasi</div>
                            <div class="text-2xl font-bold text-blue-900">{{ $exam->duration_minutes }} Menit</div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-question-circle text-white text-xl"></i>
                        </div>
                        <div>
                            <div class="text-sm text-green-600 font-medium">Jumlah Soal</div>
                            <div class="text-2xl font-bold text-green-900">{{ $exam->total_questions }} Soal</div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                        <div>
                            <div class="text-sm text-purple-600 font-medium">Passing Grade</div>
                            <div class="text-2xl font-bold text-purple-900">{{ $exam->passing_grade }}</div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                        <div>
                            <div class="text-sm text-orange-600 font-medium">Poin Per Soal</div>
                            <div class="text-2xl font-bold text-orange-900">5 Poin</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-lg mb-8">
                <h3 class="text-lg font-bold text-yellow-900 mb-3">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Perhatian!
                </h3>
                <ul class="space-y-2 text-sm text-yellow-800">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mt-1 mr-2 text-yellow-600"></i>
                        <span>Pastikan koneksi internet Anda stabil</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mt-1 mr-2 text-yellow-600"></i>
                        <span>Ujian akan dimulai segera setelah Anda klik tombol "Mulai Ujian"</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mt-1 mr-2 text-yellow-600"></i>
                        <span>Timer akan berjalan otomatis dan tidak dapat dihentikan</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mt-1 mr-2 text-yellow-600"></i>
                        <span>Ujian akan berakhir otomatis jika waktu habis</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle mt-1 mr-2 text-yellow-600"></i>
                        <span>Jawaban akan tersimpan otomatis setiap kali Anda memilih jawaban</span>
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ route('exam.start', $exam->id) }}" id="startExamForm">
                @csrf
                <div class="flex items-center mb-6">
                    <input type="checkbox" id="agree" required class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                    <label for="agree" class="ml-3 text-sm text-gray-700">
                        Saya telah membaca dan memahami semua instruksi ujian
                    </label>
                </div>

                <button type="submit" class="btn-primary w-full py-4 px-6 rounded-xl text-white font-bold text-lg">
                    <i class="fas fa-play-circle mr-2"></i>
                    Mulai Ujian Sekarang
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('startExamForm').addEventListener('submit', function(e) {
    if (!document.getElementById('agree').checked) {
        e.preventDefault();
        alert('Anda harus menyetujui instruksi terlebih dahulu');
        return false;
    }
    
    if (!confirm('Apakah Anda yakin ingin memulai ujian? Timer akan dimulai setelah ini.')) {
        e.preventDefault();
        return false;
    }
});
</script>
@endpush
@endsection