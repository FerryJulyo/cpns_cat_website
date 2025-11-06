@extends('layouts.app')

@section('title', 'Ujian Berlangsung - ' . $session->exam->title)

@push('styles')
<style>
    body {
        background: #f8f9fa !important;
    }
    
    /* Tambahkan definisi glass-card untuk background solid */
    .glass-card {
        background: white !important;
        border-radius: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    
    .timer-box {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border-radius: 15px;
        padding: 15px 25px;
        box-shadow: 0 10px 30px rgba(239, 68, 68, 0.3);
        animation: timerPulse 2s ease-in-out infinite;
    }
    
    @keyframes timerPulse {
        0%, 100% { box-shadow: 0 10px 30px rgba(239, 68, 68, 0.3); }
        50% { box-shadow: 0 10px 40px rgba(239, 68, 68, 0.5); }
    }
    
    .question-nav-btn {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .question-nav-btn:hover {
        transform: scale(1.1);
    }
    
    .question-nav-btn.answered {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }
    
    .question-nav-btn.current {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
        animation: currentPulse 1.5s ease-in-out infinite;
    }
    
    .question-nav-btn.unanswered {
        background: #e5e7eb;
        color: #6b7280;
    }
    
    @keyframes currentPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .option-card {
        border: 3px solid #e5e7eb;
        border-radius: 15px;
        padding: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .option-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .option-card:hover::before {
        left: 100%;
    }
    
    .option-card:hover {
        border-color: #667eea;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        transform: translateX(10px);
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.2);
    }
    
    .option-card.selected {
        border-color: #667eea;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15));
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
    }
    
    .option-card.selected .option-badge {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }
    
    .option-badge {
        background: #e5e7eb;
        color: #6b7280;
        transition: all 0.3s ease;
    }
    
    .option-card:hover .option-badge {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }
    
    .question-text {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #1f2937;
        font-weight: 500;
    }
    
    .question-container {
        animation: fadeInUp 0.5s ease;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@section('content')
<div class="py-4" style="background: #f8f9fa; min-height: 100vh;">
    <div class="container-fluid px-3 px-lg-5">
        <!-- Header with Timer - Z-INDEX TERTINGGI -->
        <div class="glass-card p-4 mb-4 sticky-top animate__animated animate__fadeInDown" style="top: 80px; z-index: 1020; background: white;">
            <div class="row align-items-center g-3">
                <div class="col-md-6 mb-2 mb-md-0">
                    <h5 class="fw-bold mb-1">{{ $session->exam->title }}</h5>
                    <small class="text-muted">{{ $session->exam->type }} - {{ $session->exam->total_questions }} Soal</small>
                </div>
                
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end justify-content-center">
                        <div class="timer-box text-center">
                            <small class="text-white d-block opacity-75 mb-1">Waktu Tersisa</small>
                            <h3 class="text-white fw-bold mb-0" id="timer-display">00:00</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mt-3">
                <div class="d-flex justify-content-between mb-2">
                    <small class="fw-semibold text-muted">Progress: <span id="answered-count" class="text-dark">0</span> / {{ $session->exam->total_questions }}</small>
                    <small class="fw-semibold text-primary" id="progress-percentage">0%</small>
                </div>
                <div class="progress" style="height: 8px; border-radius: 10px; background-color: #e5e7eb;">
                    <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%; background: linear-gradient(90deg, #667eea, #764ba2); border-radius: 10px; transition: width 0.3s ease;"></div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Question Navigation Sidebar - Z-INDEX MENENGAH -->
            <div class="col-lg-3 col-xl-2">
                <div class="glass-card p-4 sticky-top" style="top: 260px; z-index: 100; background: white;" data-aos="fade-right">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-list me-2 text-primary"></i>Navigasi Soal
                    </h6>
                    
                    <!-- Gunakan Bootstrap Grid untuk Layout Rapi -->
                    <div class="row g-2">
                        @foreach($session->exam->questions as $index => $question)
                        <div class="col-auto">
                            <button 
                                onclick="showQuestion({{ $index }})" 
                                class="question-nav-btn question-nav unanswered"
                                data-question="{{ $index }}"
                                data-question-id="{{ $question->id }}">
                                {{ $index + 1 }}
                            </button>
                        </div>
                        @endforeach
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="small">
                        <div class="d-flex align-items-center mb-2">
                            <div style="width: 25px; height: 25px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 5px;"></div>
                            <small class="ms-2">Terjawab</small>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div style="width: 25px; height: 25px; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 5px;"></div>
                            <small class="ms-2">Sedang Dijawab</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <div style="width: 25px; height: 25px; background: #e5e7eb; border-radius: 5px;"></div>
                            <small class="ms-2">Belum Dijawab</small>
                        </div>
                    </div>

                    <button onclick="submitExam()" class="btn btn-danger w-100 mt-4 py-3 rounded-pill fw-bold">
                        <i class="fas fa-check-circle me-2"></i>
                        Selesai & Submit
                    </button>
                </div>
            </div>

            <!-- Question Display - Z-INDEX RENDAH -->
            <div class="col-lg-9 col-xl-10" style="position: relative; z-index: 50;">
                @foreach($session->exam->questions as $index => $question)
                <div class="glass-card p-4 p-lg-5 question-container {{ $index == 0 ? '' : 'd-none' }}" 
                     data-question="{{ $index }}" 
                     data-question-id="{{ $question->id }}"
                     id="question-{{ $index }}"
                     style="position: relative; z-index: 10; background: white;">
                    
                    <!-- Question Header -->
                    <div class="row mb-4">
                        <div class="col">
                            <span class="badge badge-custom fs-6 px-4 py-2" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                                <i class="fas fa-file-alt me-2"></i>Soal No. {{ $index + 1 }}
                            </span>
                        </div>
                        <div class="col-auto">
                            <span class="badge bg-light text-dark border px-3 py-2">
                                <i class="fas fa-star text-warning me-1"></i>Poin: {{ $question->point }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Question Text -->
                    <div class="mb-5">
                        <div class="p-4 rounded-3" style="background: linear-gradient(135deg, #f3f4f6, #e5e7eb);">
                            <p class="question-text mb-0">{{ $question->question_text }}</p>
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="mb-5">
                        <h6 class="fw-bold mb-3 text-muted">
                            <i class="fas fa-tasks me-2"></i>Pilih Jawaban:
                        </h6>
                        <div class="d-grid gap-3">
                            @foreach(['A', 'B', 'C', 'D', 'E'] as $option)
                            <label class="option-card" id="option-{{ $index }}-{{ $option }}">
                                <input 
                                    type="radio" 
                                    name="question_{{ $question->id }}" 
                                    value="{{ $option }}"
                                    class="d-none"
                                    onchange="saveAnswer({{ $question->id }}, '{{ $option }}', {{ $index }})"
                                    {{ optional($session->answers->where('question_id', $question->id)->first())->user_answer == $option ? 'checked' : '' }}>
                                <div class="d-flex align-items-start">
                                    <span class="badge option-badge me-3 flex-shrink-0" style="font-size: 1rem; padding: 10px 15px; min-width: 45px;">
                                        {{ $option }}
                                    </span>
                                    <span class="flex-grow-1 option-text" style="font-size: 1rem; line-height: 1.6;">
                                        {{ $question->{'option_' . strtolower($option)} }}
                                    </span>
                                    <i class="fas fa-check-circle text-success ms-2 d-none check-icon" style="font-size: 1.5rem;"></i>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                        <button 
                            onclick="previousQuestion()" 
                            class="btn btn-outline-secondary btn-lg rounded-pill px-4 {{ $index == 0 ? 'invisible' : '' }}"
                            style="min-width: 150px;">
                            <i class="fas fa-chevron-left me-2"></i>Sebelumnya
                        </button>
                        
                        <div class="text-center d-none d-md-block">
                            <small class="text-muted">Soal <strong class="text-primary">{{ $index + 1 }}</strong> dari <strong>{{ $session->exam->total_questions }}</strong></small>
                        </div>
                        
                        <button 
                            onclick="nextQuestion()" 
                            class="btn btn-gradient btn-lg rounded-pill px-4 {{ $index == count($session->exam->questions) - 1 ? 'invisible' : '' }}"
                            style="min-width: 150px;">
                            Selanjutnya<i class="fas fa-chevron-right ms-2"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let currentQuestion = 0;
let totalQuestions = {{ $session->exam->total_questions }};
let remainingSeconds = {{ $remainingSeconds }};
let answeredQuestions = new Set();
let timerInterval;

// Initialize answered questions from session
@foreach($session->answers as $answer)
    @if($answer->user_answer)
        answeredQuestions.add({{ $answer->question_id }});
    @endif
@endforeach

document.addEventListener('DOMContentLoaded', function() {
    startTimer();
    updateProgress();
    updateNavigationButtons();
    
    // Mark already answered questions
    document.querySelectorAll('input[type="radio"]:checked').forEach(radio => {
        const card = radio.closest('.option-card');
        card.classList.add('selected');
        card.querySelector('.check-icon').classList.remove('d-none');
    });
});

function startTimer() {
    updateTimerDisplay();
    
    timerInterval = setInterval(function() {
        remainingSeconds--;
        updateTimerDisplay();
        
        if (remainingSeconds <= 0) {
            clearInterval(timerInterval);
            alert('Waktu habis! Ujian akan diselesaikan otomatis.');
            submitExam();
        } else if (remainingSeconds <= 300) {
            document.querySelector('.timer-box').style.animation = 'timerPulse 0.5s ease-in-out infinite';
        }
    }, 1000);
}

function updateTimerDisplay() {
    let minutes = Math.floor(Math.max(0, remainingSeconds) / 60);
    let seconds = Math.floor(Math.max(0, remainingSeconds) % 60);
    document.getElementById('timer-display').textContent = 
        String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
}

function showQuestion(index) {
    // Hide all questions
    document.querySelectorAll('.question-container').forEach(container => {
        container.classList.add('d-none');
        container.classList.remove('animate__animated', 'animate__fadeIn');
    });
    
    // Show selected question with animation
    const targetQuestion = document.querySelector(`.question-container[data-question="${index}"]`);
    targetQuestion.classList.remove('d-none');
    targetQuestion.classList.add('animate__animated', 'animate__fadeIn');
    
    currentQuestion = index;
    updateNavigationButtons();
    
    // Scroll to top smoothly
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function nextQuestion() {
    if (currentQuestion < totalQuestions - 1) {
        showQuestion(currentQuestion + 1);
    }
}

function previousQuestion() {
    if (currentQuestion > 0) {
        showQuestion(currentQuestion - 1);
    }
}

function updateNavigationButtons() {
    document.querySelectorAll('.question-nav').forEach(btn => {
        let questionIndex = parseInt(btn.dataset.question);
        let questionId = parseInt(btn.dataset.questionId);
        
        btn.classList.remove('answered', 'current', 'unanswered');
        
        if (answeredQuestions.has(questionId)) {
            btn.classList.add('answered');
        } else if (questionIndex === currentQuestion) {
            btn.classList.add('current');
        } else {
            btn.classList.add('unanswered');
        }
    });
}

function updateProgress() {
    let answeredCount = answeredQuestions.size;
    let percentage = Math.round((answeredCount / totalQuestions) * 100);
    
    document.getElementById('answered-count').textContent = answeredCount;
    document.getElementById('progress-percentage').textContent = percentage + '%';
    document.getElementById('progress-bar').style.width = percentage + '%';
}

function saveAnswer(questionId, answer, questionIndex) {
    // Update UI immediately
    const questionContainer = document.querySelector(`.question-container[data-question="${questionIndex}"]`);
    
    // Remove selected class from all options
    questionContainer.querySelectorAll('.option-card').forEach(card => {
        card.classList.remove('selected');
        card.querySelector('.check-icon').classList.add('d-none');
    });
    
    // Add selected class to chosen option
    const selectedCard = questionContainer.querySelector(`#option-${questionIndex}-${answer}`);
    selectedCard.classList.add('selected');
    selectedCard.querySelector('.check-icon').classList.remove('d-none');
    
    // Show success animation
    const checkIcon = selectedCard.querySelector('.check-icon');
    checkIcon.style.animation = 'bounce 0.5s ease';
    
    // Save to server
    fetch('{{ route("exam.saveAnswer", $session->id) }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            question_id: questionId,
            answer: answer
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            answeredQuestions.add(questionId);
            updateProgress();
            updateNavigationButtons();
            showNotification('✓ Jawaban tersimpan!', 'success');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('✗ Gagal menyimpan jawaban', 'error');
    });
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed animate__animated animate__fadeInUp shadow-lg`;
    notification.style.cssText = 'bottom: 20px; right: 20px; z-index: 9999; min-width: 250px;';
    notification.innerHTML = `<strong>${message}</strong>`;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.remove('animate__fadeInUp');
        notification.classList.add('animate__fadeOutDown');
        setTimeout(() => notification.remove(), 500);
    }, 2000);
}

function submitExam() {
    let unansweredCount = totalQuestions - answeredQuestions.size;
    let confirmMessage = unansweredCount > 0 
        ? `⚠️ Anda masih memiliki ${unansweredCount} soal yang belum dijawab.\n\nApakah Anda yakin ingin menyelesaikan ujian?`
        : '✓ Semua soal sudah dijawab!\n\nApakah Anda yakin ingin menyelesaikan ujian?';
    
    if (confirm(confirmMessage)) {
        clearInterval(timerInterval);
        
        // Show loading
        document.body.style.cursor = 'wait';
        
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("exam.submit", $session->id) }}';
        
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);
        
        document.body.appendChild(form);
        form.submit();
    }
}

// Prevent page reload/close during exam
window.addEventListener('beforeunload', function(e) {
    e.preventDefault();
    e.returnValue = 'Ujian sedang berlangsung. Apakah Anda yakin ingin meninggalkan halaman?';
    return 'Ujian sedang berlangsung. Apakah Anda yakin ingin meninggalkan halaman?';
});

// Disable right click
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    return false;
});

// Disable certain keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Disable F12, Ctrl+Shift+I, Ctrl+Shift+C, Ctrl+U, Ctrl+S
    if (e.key === 'F12' || 
        (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'C')) ||
        (e.ctrlKey && (e.key === 'u' || e.key === 's' || e.key === 'p'))) {
        e.preventDefault();
        return false;
    }
});
</script>
@endpush
@endsection