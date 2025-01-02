<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBooking;
use App\Models\Movie;

class UserBookingController extends Controller
{
    // Show all bookings for the logged-in user
    public function showBookings()
    {
        $user = auth()->user();
        $userBookings = $user->userBookings()->with('movie')->get(); // Fetch bookings with related movie data

        return view('user_bookings.index', compact('userBookings'));
    }

    // Store a new booking for a movie
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'movie_id' => 'required|exists:movies,id',
            'seats_booked' => 'required|integer|min:1',
            'showing_date' => 'required|date',
            'movie_start_time' => 'required|date_format:H:i',
        ]);

        // Create the booking in the database
        $booking = UserBooking::create($validated);
        
        // Debugging - check the created booking
        dd($booking);

        // Redirect back with a success message
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }
}

