@extends('layouts.app')

@section('title', 'Hasil Ujian - ' . $session->exam->title)

@section('content')
<div class="min-vh-100 bg-light py-5">
    <div class="container">
        <!-- Result Header -->
        <div class="text-center mb-5">
            <div class="d-inline-block mb-4">
                @if ($isPassed)
                    <div class="w-100 h-100 bg-success rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 130px; height: 130px;">
                        <i class="fas fa-check-circle text-white fa-4x"></i>
                    </div>
                    <h1 class="display-4 fw-bold text-success mb-2">Selamat!</h1>
                    <p class="lead text-muted">Anda Lulus Ujian</p>
                @else
                    <div class="w-100 h-100 bg-warning rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 130px; height: 130px;">
                        <i class="fas fa-exclamation-circle text-white fa-4x"></i>
                    </div>
                    <h1 class="display-4 fw-bold text-warning mb-2">Tetap Semangat!</h1>
                    <p class="lead text-muted">Jangan Menyerah, Coba Lagi</p>
                @endif
            </div>
        </div>

        <!-- Score Card -->
        <div class="card shadow-lg border-0 mb-5">
            <div class="card-header bg-primary text-white py-4">
                <h2 class="h3 mb-1">{{ $session->exam->title }}</h2>
                <p class="mb-0 opacity-75">{{ $session->exam->type }}</p>
            </div>

            <div class="card-body p-4">
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="text-center p-4 bg-light rounded-3 border">
                            <div class="display-4 fw-bold text-primary mb-2">{{ $session->score }}</div>
                            <div class="text-muted fw-medium">Total Skor Anda</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center p-4 bg-light rounded-3 border">
                            <div class="display-4 fw-bold text-info mb-2">{{ $session->exam->passing_grade }}</div>
                            <div class="text-muted fw-medium">Passing Grade</div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="bg-success bg-opacity-10 border border-success rounded-3 p-4 text-center">
                            <i class="fas fa-check-circle text-success fa-2x mb-3"></i>
                            <div class="h2 fw-bold text-success mb-1">{{ $session->correct_answers }}</div>
                            <div class="text-success">Jawaban Benar</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-danger bg-opacity-10 border border-danger rounded-3 p-4 text-center">
                            <i class="fas fa-times-circle text-danger fa-2x mb-3"></i>
                            <div class="h2 fw-bold text-danger mb-1">{{ $session->wrong_answers }}</div>
                            <div class="text-danger">Jawaban Salah</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-secondary bg-opacity-10 border border-secondary rounded-3 p-4 text-center">
                            <i class="fas fa-question-circle text-secondary fa-2x mb-3"></i>
                            <div class="h2 fw-bold text-secondary mb-1">{{ $session->unanswered }}</div>
                            <div class="text-secondary">Tidak Dijawab</div>
                        </div>
                    </div>
                </div>

                <!-- Performance Percentage -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between text-sm text-muted mb-2">
                        <span>Persentase Kebenaran</span>
                        <span class="fw-bold">
                            {{ $session->exam->total_questions > 0 ? round(($session->correct_answers / $session->exam->total_questions) * 100, 1) : 0 }}%
                        </span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" 
                             role="progressbar" 
                             style="width: {{ $session->exam->total_questions > 0 ? ($session->correct_answers / $session->exam->total_questions) * 100 : 0 }}%"
                             aria-valuenow="{{ $session->exam->total_questions > 0 ? ($session->correct_answers / $session->exam->total_questions) * 100 : 0 }}" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                        </div>
                    </div>
                </div>

                <!-- Time Info -->
                <div class="bg-info bg-opacity-10 rounded-3 p-4 mb-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar-check text-info fa-lg me-3"></i>
                                <div>
                                    <div class="text-muted small">Tanggal Ujian</div>
                                    <div class="fw-semibold text-dark">{{ $session->start_time->format('d F Y') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock text-info fa-lg me-3"></i>
                                <div>
                                    <div class="text-muted small">Waktu Pengerjaan</div>
                                    <div class="fw-semibold text-dark">
                                        {{ $session->start_time->format('H:i') }} - {{ $session->end_time->format('H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-md-row gap-3">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg flex-fill text-white py-3">
                        <i class="fas fa-home me-2"></i>Kembali ke Dashboard
                    </a>
                    <button onclick="window.print()" class="btn btn-outline-primary btn-lg flex-fill py-3">
                        <i class="fas fa-print me-2"></i>Cetak Hasil
                    </button>
                </div>
            </div>
        </div>

        <!-- Answer Review -->
        <div class="card shadow border-0">
            <div class="card-body p-4">
                <h3 class="h4 fw-bold text-dark mb-4">
                    <i class="fas fa-list-check me-2 text-primary"></i>Review Jawaban
                </h3>

                <div class="accordion" id="answerReviewAccordion">
                    @foreach ($session->answers as $index => $answer)
                        <div class="accordion-item border-0 mb-3">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed {{ $answer->is_correct ? 'bg-success bg-opacity-10 text-success' : ($answer->user_answer ? 'bg-danger bg-opacity-10 text-danger' : 'bg-warning bg-opacity-10 text-warning') }}" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse{{ $index }}" 
                                        aria-expanded="false" 
                                        aria-controls="collapse{{ $index }}">
                                    <div class="d-flex align-items-center w-100">
                                        <span class="badge {{ $answer->is_correct ? 'bg-success' : ($answer->user_answer ? 'bg-danger' : 'bg-warning') }} me-3">
                                            {{ $index + 1 }}
                                        </span>
                                        <span class="flex-fill">Soal {{ $index + 1 }}</span>
                                        <span class="badge {{ $answer->is_correct ? 'bg-success' : ($answer->user_answer ? 'bg-danger' : 'bg-warning') }}">
                                            {{ $answer->is_correct ? 'Benar' : ($answer->user_answer ? 'Salah' : 'Tidak Dijawab') }}
                                        </span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" 
                                 class="accordion-collapse collapse" 
                                 aria-labelledby="heading{{ $index }}" 
                                 data-bs-parent="#answerReviewAccordion">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <strong>Pertanyaan:</strong>
                                        <p class="mb-2">{{ $answer->question->question_text }}</p>
                                    </div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="p-3 rounded {{ $answer->user_answer === $answer->question->correct_answer ? 'bg-success bg-opacity-10 border border-success' : 'bg-light border' }}">
                                                <strong>Jawaban Anda:</strong>
                                                <div class="mt-1">
                                                    {{ $answer->user_answer ?: 'Tidak dijawab' }}
                                                    @if($answer->user_answer === $answer->question->correct_answer)
                                                        <i class="fas fa-check text-success ms-2"></i>
                                                    @elseif($answer->user_answer)
                                                        <i class="fas fa-times text-danger ms-2"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="p-3 rounded bg-light border">
                                                <strong>Jawaban Benar:</strong>
                                                <div class="mt-1">
                                                    {{ $answer->question->correct_answer }}
                                                    <i class="fas fa-check text-success ms-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .min-vh-100 {
        min-height: 100vh;
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
    
    .card {
        border-radius: 1rem;
    }
    
    .progress {
        border-radius: 10px;
    }
    
    .accordion-button:not(.collapsed) {
        box-shadow: none;
    }
    
    @media print {
        .btn {
            display: none !important;
        }
        
        .bg-light {
            background-color: white !important;
        }
        
        .card {
            box-shadow: none !important;
            border: 1px solid #dee2e6 !important;
        }
    }
</style>
@endsection