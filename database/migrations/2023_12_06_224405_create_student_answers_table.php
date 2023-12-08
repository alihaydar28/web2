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
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("question_id")->references("id")->on("quiz_questions")->onDelete("cascade");
            $table->foreignId("student_id")->references("id")->on("students")->onDelete("cascade");
            $table->foreignId("mcq_id")->nullable()->references("id")->on("mcqchoices")->onDelete("cascade");
            $table->foreignId("truefalse_id")->nullable()->references("id")->on("truefalse_answers")->onDelete("cascade");
            $table->string('FreeTextAnswer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_answers');
    }
};
