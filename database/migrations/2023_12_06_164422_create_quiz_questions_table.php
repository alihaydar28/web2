<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("quiz_id")->references("id")->on("quizzes")->onDelete("cascade");
            $table->string('QuestionText');
            $table->boolean('IsMCQ');
            $table->boolean('IsTrueFalse');
            $table->boolean('IsFreeText');
            $table->integer('QuestionGrade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
