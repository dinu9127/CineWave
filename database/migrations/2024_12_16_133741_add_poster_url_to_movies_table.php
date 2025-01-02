<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Check if the column exists before adding it
        if (!Schema::hasColumn('movies', 'poster_url')) {
            Schema::table('movies', function (Blueprint $table) {
                $table->string('poster_url')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Check if the column exists before dropping it
        if (Schema::hasColumn('movies', 'poster_url')) {
            Schema::table('movies', function (Blueprint $table) {
                $table->dropColumn('poster_url');
            });
        }
    }
};
