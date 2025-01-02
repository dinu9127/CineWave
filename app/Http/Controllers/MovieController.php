<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\UserBooking; 
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Display all movies : GET method
    public function index()
    {
        $movies = Movie::all();
        return view('welcome', compact('movies'));
    }

    // Show details of a single movie : GET method
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('dashboard', compact('movie'));
    }

    // Handle the movie booking
    public function book(Request $request, $id)
    {
        // Find the movie by ID
        $movie = Movie::findOrFail($id);

        // Check if there are seats available
        if ($movie->seats_available > 0) {

            // Check if the user has already booked a seat for this movie
            $existingBooking = UserBooking::where('user_id', auth()->id())
                                          ->where('movie_id', $movie->id)
                                          ->first();

            if ($existingBooking) {
                // User has already booked, increment the seat count for the user
                $existingBooking->increment('seats_booked', 1);  // Increase the seats_booked by 1

                // Decrease the available seats by 1
                $movie->decrement('seats_available', 1);

                return redirect()->route('dashboard')->with('success', 'Booking updated successfully!'); // Update message

            } else {
                // User has not booked yet, create a new booking record
                $booking = UserBooking::create([
                    'user_id' => auth()->id(),  // Get the logged-in user ID
                    'movie_id' => $movie->id,   // Movie ID
                    'seats_booked' => 1,        // Number of seats booked
                    'showing_date' => $movie->movie_date,  // Movie showing date
                    'movie_start_time' => $movie->start_time, // Movie start time
                    'poster_url' => $movie->poster_url,  // Movie poster URL
                ]);

                // Decrease the available seats by 1
                $movie->decrement('seats_available', 1);

                return redirect()->route('dashboard')->with('success', 'Booking successful!'); // Success message
            }

        } else {
            // If no seats available, show error message
            return redirect()->route('dashboard')->with('error', 'No seats available!');
        }
    }
}
