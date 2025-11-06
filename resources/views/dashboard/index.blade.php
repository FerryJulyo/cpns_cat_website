@extends('layouts.app')

@section('title', 'Dashboard - Sistem Ujian CPNS')

@section('content')
<div class="py-5">
    <div class="container">
        <!-- Welcome Card -->
        <div class="glass-card p-4 mb-4 gradient-bg animate__animated animate__fadeInDown">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <h1 class="text-black fw-bold mb-2">
                        Selamat Datang, {{ auth()->user()->name }}! 👋
                    </h1>
                    <p class="text-black mb-0 opacity-75">
                        Siap untuk mengikuti ujian hari ini? Pilih ujian yang ingin Anda ikuti di bawah ini.
                    </p>
                </div>
                <div class="col-lg-3 text-center d-none d-lg-block">
                    <div class="floating">
                        <i class="fas fa-user-graduate text-black" style="font-size: 5rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-custom alert-dismissible fade show animate__animated animate__fadeInRight" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2 fw-semibold">Ujian Tersedia</h6>
                            <h2 class="fw-bold mb-0 text-primary">{{ $exams->count() }}</h2>
                        </div>
                        <div class="icon-rotate" style="width: 60px; height: 60px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-file-alt text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2 fw-semibold">Ujian Selesai</h6>
                            <h2 class="fw-bold mb-0 text-success">{{ $userSessions->where('status', 'completed')->count() }}</h2>
                        </div>
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check-circle text-white fs-3 pulse"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-2 fw-semibold">Rata-rata Skor</h6>
                            <h2 class="fw-bold mb-0 text-warning">{{ $userSessions->where('status', 'completed')->avg('score') ? number_format($userSessions->where('status', 'completed')->avg('score'), 0) : 0 }}</h2>
                        </div>
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-star text-white fs-3 icon-bounce"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Exams -->
        <div class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <h2 class="fw-bold mb-0">
                    <i class="fas fa-book-open me-2" style="color: #667eea;"></i>
                    Daftar Ujian
                </h2>
            </div>

            <div class="row g-4">
                @forelse($exams as $exam)
                <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card border-0 shadow-lg hover-lift h-100" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-header border-0 text-white text-center py-4" style="background: linear-gradient(135deg, {{ $exam->type == 'TWK' ? '#3b82f6, #2563eb' : ($exam->type == 'TIU' ? '#10b981, #059669' : '#a855f7, #9333ea') }});">
                            <div class="mb-3">
                                <i class="fas fa-graduation-cap floating" style="font-size: 3.5rem;"></i>
                            </div>
                            <span class="badge bg-white bg-opacity-25 px-3 py-2">{{ $exam->type }}</span>
                        </div>
                        
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">{{ $exam->title }}</h5>
                            <p class="card-text text-muted small">{{ $exam->description }}</p>
                            
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-clock text-primary me-2"></i>
                                    <span class="small">{{ $exam->duration_minutes }} menit</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-question-circle text-success me-2"></i>
                                    <span class="small">{{ $exam->total_questions }} soal</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-chart-line text-warning me-2"></i>
                                    <span class="small">Passing Grade: {{ $exam->passing_grade }}</span>
                                </div>
                            </div>
                            
                            <a href="{{ route('exam.show', $exam->id) }}" class="btn btn-gradient w-100">
                                <i class="fas fa-play-circle me-2"></i>Mulai Ujian
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-inbox text-muted" style="font-size: 5rem; opacity: 0.3;"></i>
                        <p class="text-muted mt-3">Belum ada ujian tersedia</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Exam History -->
        @if($userSessions->count() > 0)
        <div data-aos="fade-up">
            <h2 class="fw-bold mb-4">
                <i class="fas fa-history me-2" style="color: #667eea;"></i>
                Riwayat Ujian Terakhir
            </h2>

            <div class="glass-card p-0 table-custom">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="py-3">Ujian</th>
                                <th class="py-3">Tanggal</th>
                                <th class="py-3">Skor</th>
                                <th class="py-3">Status</th>
                                <th class="py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userSessions as $session)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3 d-flex align-items-center justify-content-center rounded-3 gradient-bg" style="width: 45px; height: 45px;">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $session->exam->title }}</div>
                                            <small class="text-muted">{{ $session->exam->type }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <small>{{ $session->created_at->format('d M Y, H:i') }}</small>
                                </td>
                                <td class="align-middle">
                                    @if($session->status == 'completed')
                                    <span class="fs-5 fw-bold text-primary">{{ $session->score }}</span>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($session->status == 'completed')
                                    <span class="badge bg-success badge-custom">
                                        <i class="fas fa-check-circle me-1"></i> Selesai
                                    </span>
                                    @elseif($session->status == 'ongoing')
                                    <span class="badge bg-warning badge-custom">
                                        <i class="fas fa-clock me-1"></i> Berlangsung
                                    </span>
                                    @else
                                    <span class="badge bg-danger badge-custom">
                                        <i class="fas fa-times-circle me-1"></i> Expired
                                    </span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($session->status == 'completed')
                                    <a href="{{ route('exam.result', $session->id) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                                        <i class="fas fa-eye me-1"></i>Detail
                                    </a>
                                    @elseif($session->status == 'ongoing')
                                    <a href="{{ route('exam.take', $session->id) }}" class="btn btn-sm btn-success rounded-pill">
                                        <i class="fas fa-play-circle me-1"></i>Lanjutkan
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
</div>
@endsection