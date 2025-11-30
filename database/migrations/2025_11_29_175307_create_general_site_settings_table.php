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
        Schema::create('general_site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('service_title')->nullable();
            $table->text('service_description')->nullable();
            $table->string('team_title')->nullable();
            $table->text('team_description')->nullable();
            $table->string('pricing_title')->nullable();
            $table->text('pricing_description')->nullable();
            $table->string('risk_disclaimer_title')->nullable();
            $table->text('risk_disclaimer_description')->nullable();
            $table->string('contact_title')->nullable();
            $table->text('contact_description')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->text('testimonial_description')->nullable();
            $table->string('happy_traders')->nullable();
            $table->string('client_rating')->nullable();
            $table->string('total_client_volume')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_site_settings');
    }
};
