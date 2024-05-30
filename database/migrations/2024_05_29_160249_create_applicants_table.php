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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('bio')
                  ->default("Hi there! I\'m using SleeveUp.");
            $table->enum('status', ['Looking for work', 'Looking for investor', 'Looking for partner'])
                  ->default('Looking for work');
            $table->text('about_me')
                  ->default("Welcome to my profile. Here\'s a bit about me.")
                  ->nullable();
            $table->string('current_education_or_work')
                  ->default('Brawijaya University');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
