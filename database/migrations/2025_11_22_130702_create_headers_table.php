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
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('square_logo')->nullable();
            $table->string('horizontal_logo')->nullable();
            $table->string('png_horizontal_logo')->nullable();
            $table->string('png_square_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('subtitle_description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('background_image_1')->nullable();
            $table->string('background_image_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headers');
    }
};
