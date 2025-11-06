@extends('layouts.app')

@section('title', 'Login - Sistem Ujian CPNS')

@section('content')
<div class="min-vh-100 d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="text-center mb-4 animate__animated animate__fadeInDown">
                    <div class="d-inline-block p-3 rounded-circle gradient-bg mb-3 pulse">
                        <i class="fas fa-graduation-cap text-white" style="font-size: 3rem;"></i>
                    </div>
                    <h2 class="fw-bold">Masuk ke Akun Anda</h2>
                    <p class="text-muted">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Daftar di sini</a>
                    </p>
                </div>

                <div class="glass-card p-4 animate__animated animate__fadeInUp">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Error!</strong> {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope text-primary me-2"></i>Email
                            </label>
                            <input id="email" name="email" type="email" required 
                                   value="{{ old('email') }}"
                                   class="form-control"
                                   placeholder="nama@email.com">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="fas fa-lock text-primary me-2"></i>Password
                            </label>
                            <input id="password" name="password" type="password" required
                                   class="form-control"
                                   placeholder="••••••••">
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>

                            <a href="#" class="text-decoration-none small">Lupa password?</a>
                        </div>

                        <button type="submit" class="btn btn-gradient w-100 py-3">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection