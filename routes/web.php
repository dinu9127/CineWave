<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserBookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Add Auth facade
use App\Models\Movie;
use App\Models\UserBooking; // Add Booking model

// Home route to show the list of movies
Route::get('/', [MovieController::class, 'index']); // Show the list of movies on the homepage

// '/dashboard' route to fetch movies and user bookings
Route::get('/dashboard', function () {
    $movies = Movie::all(); // Fetch all movies
    $userBookings = UserBooking::where('user_id', Auth::id())->with('movie')->get(); // Fetch bookings for the logged-in user
    return view('dashboard', compact('movies', 'userBookings')); // Pass both movies and user bookings to the view
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Routes for movies
    Route::get('/movies', [MovieController::class, 'index'])->name('movies.index'); // Show all movies
    Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show'); // Show individual movie details
    Route::post('/movies/{id}/book', [MovieController::class, 'book'])->name('movies.book'); // Handle movie booking

    // Route for bookings page
    Route::get('/bookings', [UserBookingController::class, 'showBookings'])->name('bookings.index'); // Show user's bookings

    // Route to store a new booking
    Route::post('/bookings', [UserBookingController::class, 'store'])->name('bookings.store'); // Store a new booking

    // Routes for profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';
