@extends('layouts.app')

@section('title', 'Selamat Datang - Sistem Ujian CPNS')

@section('content')
<div class="min-vh-100 d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="glass-card p-5 animate__animated animate__fadeInUp">
                    <div class="text-center mb-5">
                        <div class="mb-4">
                            <div class="d-inline-block p-4 rounded-circle gradient-bg pulse">
                                <i class="fas fa-graduation-cap text-white" style="font-size: 4rem;"></i>
                            </div>
                        </div>
                        <h1 class="display-3 fw-bold mb-3 animate__animated animate__fadeIn" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            Sistem Ujian CPNS
                        </h1>
                        <p class="lead text-muted mb-4 animate__animated animate__fadeIn animate__delay-1s">
                            Platform ujian online yang modern, aman, dan terpercaya untuk persiapan CPNS Anda
                        </p>
                    </div>

                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center mb-5 animate__animated animate__fadeIn animate__delay-2s">
                        <a href="{{ route('login') }}" class="btn btn-gradient btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg" style="border-width: 2px; border-radius: 50px;">
                            <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                        </a>
                    </div>

                    <div class="row g-4 mt-4">
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="text-center p-4 bg-light rounded-4 h-100 hover-lift">
                                <div class="mb-3">
                                    <i class="fas fa-clock text-primary icon-bounce" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Ujian Real-time</h5>
                                <p class="text-muted small mb-0">Timer otomatis dan sistem yang akurat</p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="text-center p-4 bg-light rounded-4 h-100 hover-lift">
                                <div class="mb-3">
                                    <i class="fas fa-chart-line text-success icon-bounce" style="font-size: 3rem; animation-delay: 0.2s;"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Penilaian Otomatis</h5>
                                <p class="text-muted small mb-0">Hasil langsung setelah ujian selesai</p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="text-center p-4 bg-light rounded-4 h-100 hover-lift">
                                <div class="mb-3">
                                    <i class="fas fa-shield-alt text-danger icon-bounce" style="font-size: 3rem; animation-delay: 0.4s;"></i>
                                </div>
                                <h5 class="fw-bold mb-2">Aman & Terpercaya</h5>
                                <p class="text-muted small mb-0">Data Anda dijamin keamanannya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection