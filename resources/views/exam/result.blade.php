@extends('layouts.app')

@section('title', 'Hasil Ujian - ' . $session->exam->title)

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-blue-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Result Header -->
            <div class="text-center mb-8 animate-fadeIn">
                <div class="inline-block mb-6">
                    @if ($isPassed)
                        <div
                            class="w-32 h-32 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse-slow">
                            <i class="fas fa-check-circle text-white text-6xl"></i>
                        </div>
                        <h1 class="text-4xl font-bold text-green-600 mb-2">Selamat!</h1>
                        <p class="text-xl text-gray-700">Anda Lulus Ujian</p>
                    @else
                        <div
                            class="w-32 h-32 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse-slow">
                            <i class="fas fa-exclamation-circle text-white text-6xl"></i>
                        </div>
                        <h1 class="text-4xl font-bold text-orange-600 mb-2">Tetap Semangat!</h1>
                        <p class="text-xl text-gray-700">Jangan Menyerah, Coba Lagi</p>
                    @endif
                </div>
            </div>

            <!-- Score Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8 animate-fadeIn">
                <div class="bg-gradient-to-r from-purple-600 to-blue-500 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white">{{ $session->exam->title }}</h2>
                    <p class="text-white/80">{{ $session->exam->type }}</p>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl">
                            <div class="text-6xl font-bold text-purple-600 mb-2">{{ $session->score }}</div>
                            <div class="text-sm text-purple-800 font-medium">Total Skor Anda</div>
                        </div>

                        <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl">
                            <div class="text-6xl font-bold text-blue-600 mb-2">{{ $session->exam->passing_grade }}</div>
                            <div class="text-sm text-blue-800 font-medium">Passing Grade</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6 text-center">
                            <i class="fas fa-check-circle text-green-600 text-3xl mb-3"></i>
                            <div class="text-3xl font-bold text-green-600 mb-1">{{ $session->correct_answers }}</div>
                            <div class="text-sm text-green-800">Jawaban Benar</div>
                        </div>

                        <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6 text-center">
                            <i class="fas fa-times-circle text-red-600 text-3xl mb-3"></i>
                            <div class="text-3xl font-bold text-red-600 mb-1">{{ $session->wrong_answers }}</div>
                            <div class="text-sm text-red-800">Jawaban Salah</div>
                        </div>

                        <div class="bg-gray-50 border-2 border-gray-200 rounded-xl p-6 text-center">
                            <i class="fas fa-question-circle text-gray-600 text-3xl mb-3"></i>
                            <div class="text-3xl font-bold text-gray-600 mb-1">{{ $session->unanswered }}</div>
                            <div class="text-sm text-gray-800">Tidak Dijawab</div>
                        </div>
                    </div>

                    <!-- Performance Percentage -->
                    <div class="mb-8">
                        <div class="flex justify-between text-sm text-gray-600 mb-2">
                            <span>Persentase Kebenaran</span>
                            <span
                                class="font-bold">{{ $session->exam->total_questions > 0 ? round(($session->correct_answers / $session->exam->total_questions) * 100, 1) : 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-gradient-to-r from-green-500 to-green-600 h-4 rounded-full transition-all duration-1000"
                                style="width: {{ $session->exam->total_questions > 0 ? ($session->correct_answers / $session->exam->total_questions) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>

                    <!-- Time Info -->
                    <div class="bg-blue-50 rounded-xl p-6 mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-check text-blue-600 text-xl mr-3"></i>
                                <div>
                                    <div class="text-gray-600">Tanggal Ujian</div>
                                    <div class="font-semibold text-gray-900">{{ $session->start_time->format('d F Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock text-blue-600 text-xl mr-3"></i>
                                <div>
                                    <div class="text-gray-600">Waktu Pengerjaan</div>
                                    <div class="font-semibold text-gray-900">
                                        {{ $session->start_time->format('H:i') }} -
                                        {{ $session->end_time->format('H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('dashboard') }}"
                            class="flex-1 btn-primary text-center py-4 rounded-xl text-white font-semibold">
                            <i class="fas fa-home mr-2"></i>Kembali ke Dashboard
                        </a>
                        <button onclick="window.print()"
                            class="flex-1 bg-white border-2 border-purple-600 text-purple-600 py-4 rounded-xl font-semibold hover:bg-purple-50 transition">
                            <i class="fas fa-print mr-2"></i>Cetak Hasil
                        </button>
                    </div>
                </div>
            </div>

            <!-- Answer Review (Optional - can be toggled) -->
            <div class="bg-white rounded-2xl shadow-xl p-8 animate-fadeIn">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    <i class="fas fa-list-check mr-2 text-purple-600"></i>Review Jawaban
                </h3>

                <div class="space-y-4">
                    @foreach ($session->answers as $index => $answer)
                        <div @class([
                            'border-2 rounded-xl p-6',
                            'border-green-200 bg-green-50' => $answer->is_correct,
                            'border-red-200 bg-red-50' => !$answer->is_correct && $answer->user_answer,
                            'border-gray-200 bg-white' => !$answer->is_correct && !$answer->user_answer,
                        ])>
                            <div class="col-span-2">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-br from-purple-600 to-blue-500 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                                    </div>
                                    <span class="text-xl font-bold">CPNS Exam System</span>
                                </div>
                                <p class="text-gray-400 mb-4">
                                    Platform ujian CPNS online terpercaya untuk membantu Anda meraih impian menjadi Aparatur
                                    Sipil Negara.
                                </p>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                                <ul class="space-y-2 text-gray-400">
                                    <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                                    <li><a href="#" class="hover:text-white transition">Panduan</a></li>
                                    <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                                <ul class="space-y-2 text-gray-400">
                                    <li><i class="fas fa-envelope mr-2"></i>info@cpnsexam.id</li>
                                    <li><i class="fas fa-phone mr-2"></i>+62 821 xxxx xxxx</li>
                                </ul>
                            </div>
                        </div>

                        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                            <p>&copy; 2025 CPNS Exam System. All rights reserved.</p>
                        </div>
                </div>
                </footer>

                @stack('scripts')
                </body>

                </html>
