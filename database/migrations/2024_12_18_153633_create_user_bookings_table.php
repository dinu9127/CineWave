<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // foreign key to users table
            $table->foreignId('movie_id')->constrained()->onDelete('cascade'); // foreign key to movies table
            $table->integer('seats_booked');
            $table->date('showing_date');
            $table->time('movie_start_time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_bookings');
    }
};
