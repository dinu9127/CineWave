<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'movie_date', 'start_time', 'writer', 'description', 'seats_available','poster_url'
    ];

    public function bookings()
    {
        return $this->hasMany(UserBooking::class); // Assuming Booking is the model for user bookings
    }
}
