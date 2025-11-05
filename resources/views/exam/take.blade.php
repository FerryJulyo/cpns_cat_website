@extends('layouts.app')

@section('title', 'Ujian Berlangsung - ' . $session->exam->title)

@section('content')
<div class="min-h-screen bg-gray-50 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header with Timer -->
        <div class="bg-white rounded-xl shadow-lg p-4 mb-6 sticky top-20 z-40 animate-fadeIn">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-gray-900">{{ $session->exam->title }}</h1>
                    <p class="text-sm text-gray-600">{{ $session->exam->type }} - {{ $session->exam->total_questions }} Soal</p>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="text-center">
                        <div class="text-sm text-gray-600">Waktu Tersisa</div>
                        <div id="timer" class="text-3xl font-bold text-red-600">
                            <i class="fas fa-clock mr-2"></i>
                            <span id="timer-display">00:00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mt-4">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Progress: <span id="answered-count">0</span> / {{ $session->exam->total_questions }}</span>
                    <span id="progress-percentage">0%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div id="progress-bar" class="bg-gradient-to-r from-purple-600 to-blue-500 h-3 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Question Navigation -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-48">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">
                        <i class="fas fa-list mr-2 text-purple-600"></i>Navigasi Soal
                    </h3>
                    <div class="grid grid-cols-5 gap-2">
                        @foreach($session->exam->questions as $index => $question)
                        <button 
                            onclick="showQuestion({{ $index }})" 
                            class="question-nav w-10 h-10 rounded-lg font-semibold transition-all hover:scale-110"
                            data-question="{{ $index }}"
                            data-question-id="{{ $question->id }}">
                            {{ $index + 1 }}
                        </button>
                        @endforeach
                    </div>
                    
                    <div class="mt-6 space-y-2 text-sm">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded mr-2"></div>
                            <span class="text-gray-600">Terjawab</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-yellow-500 rounded mr-2"></div>
                            <span class="text-gray-600">Sedang Dijawab</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-300 rounded mr-2"></div>
                            <span class="text-gray-600">Belum Dijawab</span>
                        </div>
                    </div>

                    <button onclick="submitExam()" class="btn-primary w-full mt-6 py-3 rounded-lg text-white font-semibold">
                        <i class="fas fa-check-circle mr-2"></i>
                        Selesai & Submit
                    </button>
                </div>
            </div>

            <!-- Question Display -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-xl shadow-lg p-8 animate-fadeIn">
                    @foreach($session->exam->questions as $index => $question)
                    <div class="question-container {{ $index == 0 ? '' : 'hidden' }}" data-question="{{ $index }}" data-question-id="{{ $question->id }}">
                        <div class="mb-6">
                            <div class="flex items-start justify-between mb-4">
                                <span class="inline-block bg-purple-100 text-purple-800 px-4 py-2 rounded-lg font-semibold">
                                    Soal No. {{ $index + 1 }}
                                </span>
                                <span class="text-sm text-gray-500">Poin: {{ $question->point }}</span>
                            </div>
                            
                            <div class="prose max-w-none">
                                <p class="text-lg text-gray-800 leading-relaxed whitespace-pre-line">{{ $question->question_text }}</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @foreach(['A', 'B', 'C', 'D', 'E'] as $option)
                            <label class="option-label flex items-start p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-purple-500 hover:bg-purple-50 transition-all">
                                <input 
                                    type="radio" 
                                    name="question_{{ $question->id }}" 
                                    value="{{ $option }}"
                                    class="mt-1 mr-4 w-5 h-5 text-purple-600 focus:ring-purple-500"
                                    onchange="saveAnswer({{ $question->id }}, '{{ $option }}', {{ $index }})"
                                    {{ optional($session->answers->where('question_id', $question->id)->first())->user_answer == $option ? 'checked' : '' }}>
                                <div class="flex-1">
                                    <span class="font-semibold text-purple-600 mr-3">{{ $option }}.</span>
                                    <span class="text-gray-800">{{ $question->{'option_' . strtolower($option)} }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>

                        <div class="flex justify-between mt-8">
                            <button 
                                onclick="previousQuestion()" 
                                class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition {{ $index == 0 ? 'invisible' : '' }}">
                                <i class="fas fa-chevron-left mr-2"></i>Sebelumnya
                            </button>
                            
                            <button 
                                onclick="nextQuestion()" 
                                class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-500 text-white rounded-lg font-semibold hover:shadow-lg transition {{ $index == count($session->exam->questions) - 1 ? 'hidden' : '' }}">
                                Selanjutnya<i class="fas fa-chevron-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
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
            document.getElementById('timer-display').classList.add('animate-pulse');
        }
    }, 1000);
}

function updateTimerDisplay() {
    let minutes = Math.floor(remainingSeconds / 60);
    let seconds = remainingSeconds % 60;
    document.getElementById('timer-display').textContent = 
        String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
}

function showQuestion(index) {
    document.querySelectorAll('.question-container').forEach(container => {
        container.classList.add('hidden');
    });
    
    document.querySelector(`.question-container[data-question="${index}"]`).classList.remove('hidden');
    
    currentQuestion = index;
    updateNavigationButtons();
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
        
        btn.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-gray-300', 'text-white', 'text-gray-700');
        
        if (answeredQuestions.has(questionId)) {
            btn.classList.add('bg-green-500', 'text-white');
        } else if (questionIndex === currentQuestion) {
            btn.classList.add('bg-yellow-500', 'text-white');
        } else {
            btn.classList.add('bg-gray-300', 'text-gray-700');
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
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menyimpan jawaban. Silakan coba lagi.');
    });
}

function submitExam() {
    let unansweredCount = totalQuestions - answeredQuestions.size;
    let confirmMessage = unansweredCount > 0 
        ? `Anda masih memiliki ${unansweredCount} soal yang belum dijawab. Apakah Anda yakin ingin menyelesaikan ujian?`
        : 'Apakah Anda yakin ingin menyelesaikan ujian?';
    
    if (confirm(confirmMessage)) {
        clearInterval(timerInterval);
        
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("exam.submit", $session->id) }}';
        
        let csrfInput = document.createElement('input');
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
    e.returnValue = '';
    return 'Ujian sedang berlangsung. Apakah Anda yakin ingin meninggalkan halaman?';
});

// Disable right click
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

// Disable certain keyboard shortcuts
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && (e.key === 'u' || e.key === 's' || e.key === 'p')) {
        e.preventDefault();
    }
});
</script>
@endpush
@endsection