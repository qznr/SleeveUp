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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('event_organizer');
            $table->string('presenter');
            $table->string('description');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('email');
            $table->string('link_website');
            $table->string('link_register');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
