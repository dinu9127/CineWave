<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: bold; font-size: 1.5rem; color:rgb(14, 60, 138); text-align: center;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div style="padding: 1rem 0; background-color:rgb(222, 237, 247);">
        <div style="max-width: 900px; margin: 0 auto; padding: 0.5rem; background-color: #fff; border-radius: 0.25rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">
            <!-- Conditional Message for Admin -->
            @if(Auth::user()->role === 'admin')
                <div style="padding: 0.5rem; font-size: 1.25rem; color:rgb(240, 97, 137); text-align: center;">
                    Welcome!
                    You are an Admin of CineWave!
                </div>
            @else
                <div style="padding: 0.5rem; font-size: 1rem; color:rgb(37, 78, 150);text-align: center;">
                    {{ __("You're logged in!") }}
                </div>
            @endif
        </div>
    </div>

    <!-- Section for User Bookings, removed if admin -->
    @if(Auth::user()->role !== 'admin')
        <div style="padding: 3rem 0;">
            <div style="max-width: 1120px; margin: 0 auto;">
                <h3 style="font-size: 1.75rem; font-weight: bold; margin-bottom: 1rem; color:rgb(23, 69, 149);">Your Bookings</h3>

                @if ($userBookings->isEmpty())
                    <p style="font-size: 1rem; color:rgb(75, 74, 104);">You have no bookings yet.</p>
                @else
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                        @foreach ($userBookings as $booking)
                            <div style="background-color: #fff; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); overflow: hidden;">
                                <div style="padding: 1.5rem;">
                                    <h4 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem;">{{ $booking->movie->name }}</h4>
                                    <p style="font-size: 1rem; margin-bottom: 0.25rem;">Seats Booked: <strong>{{ $booking->seats_booked }}</strong></p>
                                    <p style="font-size: 1rem; margin-bottom: 0.25rem;">Movie Start Time: <strong>{{ $booking->movie_start_time }}</strong></p>
                                    <p style="font-size: 1rem;">Showing Date: <strong>{{ $booking->showing_date }}</strong></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif

    <!-- Section for Movies Grid -->
    <div style="padding: 3rem 0;">
        <div style="max-width: 1120px; margin: 0 auto;">
            <h3 style="font-size: 1.75rem; font-weight: bold; margin-bottom: 1rem; color: rgb(23, 69, 149);">Available Movies</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                @foreach ($movies as $movie)
                    <div style="background-color: #fff; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); overflow: hidden;">
                        <div style="padding: 1.5rem; color: #2d3748;">
                            <!-- Movie Poster -->
                            <img src="{{ $movie->poster_url }}" alt="Movie Poster" style="width: 100%; height: 250px; object-fit: cover; border-radius: 0.5rem;">
                            <h2 style="font-size: 1.25rem; font-weight: bold; margin-top: 1rem;">{{ $movie->name }}</h2>
                            <p style="font-size: 1rem; margin: 0.5rem 0;"><strong>Writer:</strong> {{ $movie->writer }}</p>
                            <p style="font-size: 1rem; margin: 0.5rem 0;"><strong>Description:</strong> {{ $movie->description }}</p>
                            <p style="font-size: 1rem; margin: 0.5rem 0;"><strong>Date:</strong> {{ $movie->movie_date }}</p>
                            <p style="font-size: 1rem; margin: 0.5rem 0;"><strong>Start Time:</strong> {{ $movie->start_time }}</p>
                            <p style="font-size: 1rem; margin: 0.5rem 0;"><strong>Seats Available:</strong> {{ $movie->seats_available }}</p>

                            <!-- Remove Book Now Button for Admin -->
                            @if(Auth::user()->role !== 'admin')
                                <!-- Book Now Button POST Method-->
                                <form method="POST" action="{{ route('movies.book', $movie->id) }}" style="margin-top: 1rem;">
                                    @csrf
                                    <button
                                        type="submit"
                                        style="background-color:rgb(251, 185, 104); color: #000; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: bold; text-align: center; display: block; width: 100%; transition: background-color 0.3s ease;"
                                        onmouseover="this.style.backgroundColor='#4299e1'"
                                        onmouseout="this.style.backgroundColor='#f6ad55'">
                                        Book Now
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background-color: rgb(8, 41, 99); color: white; padding: 1.5rem 0; text-align: center;">
        <div style="max-width: 1120px; margin: 0 auto;">
            <p style="font-size: 1rem;">&copy; 2024 CineWave. All Rights Reserved.</p>
            
        </div>
    </footer>
</x-app-layout>
