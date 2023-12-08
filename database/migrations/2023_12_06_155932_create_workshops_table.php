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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->foreignId("alumnis_id")->references("id")->on("alumnis")->onDelete("cascade");
            $table->string('WorkshopName');
            $table->string('WorkshopDecription')->nullable();
            $table->dateTime('WorkshopDateAndTime')->nullable();
            $table->string('WorkshopLocation')->nullable();
            $table->boolean('accepted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
