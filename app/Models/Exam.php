<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'title', 'description', 'type', 'duration_minutes',
        'total_questions', 'passing_grade', 'is_active'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function examSessions()
    {
        return $this->hasMany(ExamSession::class);
    }
}