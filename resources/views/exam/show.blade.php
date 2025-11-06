@extends('layouts.app')

@section('title', $exam->title . ' - Sistem Ujian CPNS')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="mb-4" data-aos="fade-right">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light rounded-pill">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
        </div>

        <div class="glass-card overflow-hidden animate__animated animate__zoomIn">
            <div class="text-white text-center py-5" style="background: linear-gradient(135deg, {{ $exam->type == 'TWK' ? '#3b82f6, #2563eb' : ($exam->type == 'TIU' ? '#10b981, #059669' : '#a855f7, #9333ea') }});">
                <div class="mb-4 floating">
                    <i class="fas fa-graduation-cap" style="font-size: 5rem;"></i>
                </div>
                <h1 class="display-5 fw-bold mb-3">{{ $exam->title }}</h1>
                <span class="badge bg-white bg-opacity-25 px-4 py-2 fs-6">{{ $exam->type }}</span>
            </div>

            <div class="p-5">
                <div class="mb-5" data-aos="fade-up">
                    <h3 class="fw-bold mb-3">Deskripsi Ujian</h3>
                    <p class="text-muted lead">{{ $exam->description }}</p>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-4 rounded-4 h-100" style="background: linear-gradient(135deg, #dbeafe, #bfdbfe);">
                            <div class="d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-3" style="width: 60px; height: 60px; background: #3b82f6;">
                                    <i class="fas fa-clock text-white fs-3"></i>
                                </div>
                                <div>
                                    <small class="text-primary fw-semibold">Durasi</small>
                                    <h3 class="fw-bold text-primary mb-0">{{ $exam->duration_minutes }} Menit</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="p-4 rounded-4 h-100" style="background: linear-gradient(135deg, #d1fae5, #a7f3d0);">
                            <div class="d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-3" style="width: 60px; height: 60px; background: #10b981;">
                                    <i class="fas fa-question-circle text-white fs-3"></i>
                                </div>
                                <div>
                                    <small class="text-success fw-semibold">Jumlah Soal</small>
                                    <h3 class="fw-bold text-success mb-0">{{ $exam->total_questions }} Soal</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="p-4 rounded-4 h-100" style="background: linear-gradient(135deg, #e9d5ff, #d8b4fe);">
                            <div class="d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-3" style="width: 60px; height: 60px; background: #a855f7;">
                                    <i class="fas fa-chart-line text-white fs-3"></i>
                                </div>
                                <div>
                                    <small class="text-purple fw-semibold">Passing Grade</small>
                                    <h3 class="fw-bold mb-0" style="color: #a855f7;">{{ $exam->passing_grade }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="p-4 rounded-4 h-100" style="background: linear-gradient(135deg, #fed7aa, #fdba74);">
                            <div class="d-flex align-items-center">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-3" style="width: 60px; height: 60px; background: #f97316;">
                                    <i class="fas fa-star text-white fs-3"></i>
                                </div>
                                <div>
                                    <small class="text-warning fw-semibold">Poin Per Soal</small>
                                    <h3 class="fw-bold text-warning mb-0">5 Poin</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert border-0 mb-5" style="background: linear-gradient(135deg, #fef3c7, #fde68a); border-left: 4px solid #f59e0b !important;" data-aos="fade-up">
                    <h5 class="fw-bold mb-3" style="color: #92400e;">
                        <i class="fas fa-exclamation-triangle me-2"></i>Perhatian!
                    </h5>
                    <ul class="mb-0" style="color: #92400e;">
                        <li class="mb-2">✅ Pastikan koneksi internet Anda stabil</li>
                        <li class="mb-2">✅ Ujian akan dimulai segera setelah Anda klik tombol "Mulai Ujian"</li>
                        <li class="mb-2">✅ Timer akan berjalan otomatis dan tidak dapat dihentikan</li>
                        <li class="mb-2">✅ Ujian akan berakhir otomatis jika waktu habis</li>
                        <li>✅ Jawaban akan tersimpan otomatis setiap kali Anda memilih jawaban</li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('exam.start', $exam->id) }}" id="startExamForm" data-aos="fade-up">
                    @csrf
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="agree" required style="width: 20px; height: 20px;">
                        <label class="form-check-label ms-2" for="agree">
                            Saya telah membaca dan memahami semua instruksi ujian
                        </label>
                    </div>

                    <button type="submit" class="btn btn-gradient w-100 py-4 fs-5">
                        <i class="fas fa-play-circle me-2"></i>
                        Mulai Ujian Sekarang
                    </button>
                </form>
            </div>
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