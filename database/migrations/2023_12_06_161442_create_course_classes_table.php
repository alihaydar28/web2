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
        Schema::create('course_classes', function (Blueprint $table) {
            $table->id();
            $table->string('ClassName');
            $table->foreignId("semester_id")->references("id")->on("semesters")->onDelete("cascade");
            $table->foreignId("course_id")->references("id")->on("courses")->onDelete("cascade");
            $table->foreignId("teacher_id")->references("id")->on("teachers");
            $table->Integer('ClassCapacity');
            $table->string('ClassLocation');
            $table->dateTime('ClassDateAndTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_classes');
    }
};
