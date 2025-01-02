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
        // Drop the 'bookings' table
        Schema::dropIfExists('bookings');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally recreate the 'bookings' table (if you want to be able to rollback)
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
        });
    }
};
