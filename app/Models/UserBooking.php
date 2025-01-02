<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBooking extends Model
{
    use HasFactory;

    protected $table = 'user_bookings'; // Explicitly define the table name

    // Allow mass assignment for these attributes
    protected $fillable = [
        'user_id',
        'movie_id',
        'seats_booked',
        'showing_date',
        'movie_start_time',
        'poster_url',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Movie model
    public function movie()
    {
        return $this->belongsTo(Movie::class); // Assuming  have a Movie model
    }
}
