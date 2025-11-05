<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['TWK', 'TIU', 'TKP']); // Tes Wawasan Kebangsaan, Tes Intelegensia Umum, Tes Karakteristik Pribadi
            $table->integer('duration_minutes');
            $table->integer('total_questions');
            $table->integer('passing_grade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};