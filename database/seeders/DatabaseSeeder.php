<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\MovieSeeder; // Import the MovieSeeder
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the user data
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed the movie data
        $this->call(MovieSeeder::class); // Add this line to call the MovieSeeder
    }
}

