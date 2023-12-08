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
        Schema::create('freetext_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("question_id")->references("id")->on("quiz_questions")->onDelete("cascade");
            $table->string('AnswerText');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freetext_answers');
    }
};
