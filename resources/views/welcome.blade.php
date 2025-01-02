<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CineWave - Movie Seat Booking</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* General Body Styling */
        body {
            background: linear-gradient(to right,rgb(91, 123, 213),rgb(192, 209, 247),rgb(205, 217, 236));
            color:rgb(255, 255, 255);
            font-family: 'Figtree', sans-serif;
        }

        /* Header Styling */
        header {
            background-color: rgba(47, 103, 199, 0.9);
            border-bottom: 1px solid #3b82f6;
        }

        /* Hero Section */
        .hero {
            background: url('images/cinewave.jpg') no-repeat center center/cover;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
            color:rgb(249, 112, 7);
        }

        .hero p {
            font-size: 1.25rem;
            margin-top: 1rem;
        }

        .hero a {
            margin-top: 1.5rem;
            display: inline-block;
            background-color:rgb(212, 122, 18);
            color: #1e3a8a;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        .hero a:hover {
            background-color: #f59e0b;
        }

        /* Movie Card Styling */
        .movie-card {
            background-color: #475569;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .movie-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .movie-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.4);
        }

        .movie-card h3 {
            color: #facc15;
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Login/Register Buttons Styling */
        .button {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            font-size: 1rem;
            font-weight: 600;
            border: 2px solid transparent;
            border-radius: 0.5rem;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .button-primary {
            background-color:rgb(250, 143, 21);
            color:rgb(34, 61, 106);
        }

        .button-primary:hover {
            background-color:rgb(250, 143, 21);
            color: #fff;
        }

        .button-secondary {
            background-color: transparent;
            border-color: #facc15;
            color: #facc15;
        }

        .button-secondary:hover {
            background-color: #facc15;
            color: #1e293b;
        }

        /* Footer Styling */
        footer {
            background-color:rgb(9, 46, 104);
            color: #cbd5e1;
            padding: 1rem 0;
            text-align: center;
        }

        footer a {
            color: #3b82f6;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #facc15;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="fixed w-full z-10 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center">
                <img class="h-10 w-auto" src="images/logo.png" alt="CineWave Logo" />
                <h1 class="ml-3 text-2xl font-bold text-yellow-400">CineWave</h1>
            </div>
            @if (Route::has('login'))
                <nav class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="button button-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="button button-secondary">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button button-primary">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <br><br><br><br>

    <!-- Hero Section -->
    <section class="hero">
        <div class="text-center">
            <h1>Experience Cinema Like Never Before</h1>
            <p>Book your seats for the latest blockbuster movies today!</p>
            <a href="#now-showing">Browse Movies</a>
        </div>
    </section>
    <br>

    <!-- Main Content -->
    <main class="container mx-auto px-4 pt-12" id="now-showing">
        <!-- Now Showing -->
        <section style="margin-bottom: 60px;">
        <h1 class="text-6xl font-bold mb-6 text-center" style="color:rgb(24, 8, 95); text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.8);">
    Now Showing!!!
    <br>
        Book Your Seats Today!
        </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" style="gap: 75px;">

                @foreach ($movies as $movie)
                    <div class="movie-card">
                        <img src="{{ $movie->poster_url }}" alt="Movie Poster">
                        <div class="p-4">
                            <h3>{{ $movie->name }}</h3>
                            <p>{{ $movie->movie_date }} | {{ $movie->start_time }}</p>
                          

                         </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} CineWave| All rights reserved.</p>
        <p>Follow us on 
            <a href="#" class="hover:text-yellow-400">Facebook</a>, 
            <a href="#" class="hover:text-yellow-400">Twitter</a>, and 
            <a href="#" class="hover:text-yellow-400">Instagram</a>.
        </p>
    </footer>
</body>
</html>
