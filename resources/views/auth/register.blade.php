@extends('layouts.app')

@section('title', 'Registrasi - Sistem Ujian CPNS')

@section('content')
<div class="min-vh-100 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-4 animate__animated animate__fadeInDown">
                    <div class="d-inline-block p-3 rounded-circle gradient-bg mb-3 pulse">
                        <i class="fas fa-user-plus text-white" style="font-size: 3rem;"></i>
                    </div>
                    <h2 class="fw-bold">Buat Akun Baru</h2>
                    <p class="text-white">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-white fw-bold">Login di sini</a>
                    </p>
                </div>

                <div class="glass-card p-4 animate__animated animate__fadeInUp">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Terdapat kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">
                                    <i class="fas fa-user text-primary me-2"></i>Nama Lengkap
                                </label>
                                <input id="name" name="name" type="text" required 
                                       value="{{ old('name') }}"
                                       class="form-control"
                                       placeholder="John Doe">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="fas fa-envelope text-primary me-2"></i>Email
                                </label>
                                <input id="email" name="email" type="email" required 
                                       value="{{ old('email') }}"
                                       class="form-control"
                                       placeholder="nama@email.com">
                            </div>

                            <div class="col-md-6">
                                <label for="nik" class="form-label fw-semibold">
                                    <i class="fas fa-id-card text-primary me-2"></i>NIK (16 digit)
                                </label>
                                <input id="nik" name="nik" type="text" required 
                                       value="{{ old('nik') }}"
                                       maxlength="16"
                                       class="form-control"
                                       placeholder="1234567890123456">
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">
                                    <i class="fas fa-phone text-primary me-2"></i>No. Telepon
                                </label>
                                <input id="phone" name="phone" type="text" required 
                                       value="{{ old('phone') }}"
                                       class="form-control"
                                       placeholder="08123456789">
                            </div>

                            <div class="col-md-6">
                                <label for="birth_date" class="form-label fw-semibold">
                                    <i class="fas fa-calendar text-primary me-2"></i>Tanggal Lahir
                                </label>
                                <input id="birth_date" name="birth_date" type="date" required 
                                       value="{{ old('birth_date') }}"
                                       class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="gender" class="form-label fw-semibold">
                                    <i class="fas fa-venus-mars text-primary me-2"></i>Jenis Kelamin
                                </label>
                                <select id="gender" name="gender" required class="form-select">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label fw-semibold">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>Alamat Lengkap
                                </label>
                                <textarea id="address" name="address" rows="3" required
                                          class="form-control"
                                          placeholder="Jalan, Kecamatan, Kabupaten/Kota, Provinsi">{{ old('address') }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label fw-semibold">
                                    <i class="fas fa-lock text-primary me-2"></i>Password
                                </label>
                                <input id="password" name="password" type="password" required
                                       class="form-control"
                                       placeholder="Min. 8 karakter">
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label fw-semibold">
                                    <i class="fas fa-lock text-primary me-2"></i>Konfirmasi Password
                                </label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                       class="form-control"
                                       placeholder="Ulangi password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient w-100 py-3 mt-4">
                            <i class="fas fa-user-plus me-2"></i>
                            Daftar Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection