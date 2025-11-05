<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamSession;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $exam = Exam::with('questions')->findOrFail($id);
        
        // Check if user has ongoing session for this exam
        $ongoingSession = ExamSession::where('user_id', auth()->id())
            ->where('exam_id', $id)
            ->where('status', 'ongoing')
            ->first();

        if ($ongoingSession) {
            return redirect()->route('exam.take', $ongoingSession->id);
        }

        return view('exam.show', compact('exam'));
    }

    public function start($examId)
    {
        $exam = Exam::with('questions')->findOrFail($examId);

        // Create new exam session
        $session = ExamSession::create([
            'user_id' => auth()->id(),
            'exam_id' => $exam->id,
            'start_time' => now(),
            'status' => 'ongoing',
            'unanswered' => $exam->total_questions,
        ]);

        // Create answer records for all questions
        foreach ($exam->questions as $question) {
            Answer::create([
                'exam_session_id' => $session->id,
                'question_id' => $question->id,
            ]);
        }

        return redirect()->route('exam.take', $session->id);
    }

    public function take($sessionId)
    {
        $session = ExamSession::with(['exam.questions', 'answers.question'])
            ->findOrFail($sessionId);

        // Check if session belongs to current user
        if ($session->user_id !== auth()->id()) {
            abort(403);
        }

        // Check if session is still ongoing
        if ($session->status !== 'ongoing') {
            return redirect()->route('exam.result', $session->id);
        }

        // Calculate remaining time
        $endTime = $session->start_time->addMinutes($session->exam->duration_minutes);
        $remainingSeconds = now()->diffInSeconds($endTime, false);

        if ($remainingSeconds <= 0) {
            $this->finishExam($session);
            return redirect()->route('exam.result', $session->id);
        }

        return view('exam.take', compact('session', 'remainingSeconds'));
    }

    public function saveAnswer(Request $request, $sessionId)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|in:A,B,C,D,E',
        ]);

        $session = ExamSession::findOrFail($sessionId);

        if ($session->user_id !== auth()->id() || $session->status !== 'ongoing') {
            return response()->json(['success' => false, 'message' => 'Invalid session'], 403);
        }

        $answer = Answer::where('exam_session_id', $sessionId)
            ->where('question_id', $request->question_id)
            ->first();

        $wasUnanswered = is_null($answer->user_answer);
        
        $answer->update([
            'user_answer' => $request->answer,
        ]);

        // Update unanswered count
        if ($wasUnanswered) {
            $session->decrement('unanswered');
        }

        return response()->json(['success' => true]);
    }

    public function submit($sessionId)
    {
        $session = ExamSession::with(['exam', 'answers.question'])
            ->findOrFail($sessionId);

        if ($session->user_id !== auth()->id()) {
            abort(403);
        }

        $this->finishExam($session);

        return redirect()->route('exam.result', $session->id)
            ->with('success', 'Ujian berhasil diselesaikan!');
    }

    private function finishExam($session)
    {
        DB::transaction(function () use ($session) {
            $correctAnswers = 0;
            $wrongAnswers = 0;
            $totalScore = 0;

            foreach ($session->answers as $answer) {
                if ($answer->user_answer) {
                    $isCorrect = $answer->user_answer === $answer->question->correct_answer;
                    $answer->update(['is_correct' => $isCorrect]);

                    if ($isCorrect) {
                        $correctAnswers++;
                        $totalScore += $answer->question->point;
                    } else {
                        $wrongAnswers++;
                    }
                }
            }

            $session->update([
                'end_time' => now(),
                'status' => 'completed',
                'correct_answers' => $correctAnswers,
                'wrong_answers' => $wrongAnswers,
                'score' => $totalScore,
            ]);
        });
    }

    public function result($sessionId)
    {
        $session = ExamSession::with(['exam', 'answers.question'])
            ->findOrFail($sessionId);

        if ($session->user_id !== auth()->id()) {
            abort(403);
        }

        if ($session->status !== 'completed') {
            return redirect()->route('exam.take', $session->id);
        }

        $isPassed = $session->score >= $session->exam->passing_grade;

        return view('exam.result', compact('session', 'isPassed'));
    }
}