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
        Schema::create('truefalse_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("question_id")->references("id")->on("quiz_questions")->onDelete("cascade");
            $table->boolean('IsTrue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truefalse_answers');
    }
};
