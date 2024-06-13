<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .flicker {
            animation: flicker 1s infinite;
        }

        @keyframes flicker {
            0% {
                opacity: 1;
                color: red;
            }
            50% {
                opacity: 0.5;
                color: red;
            }
            100% {
                opacity: 1;
                color:red;
            }
        }
    </style>
</head>
<body>
@include('layouts.navigation')
    <div class="flex justify-center">
        <h1 class="text-4xl font-bold mb-4">Your Reservations</h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($reservations as $reservation)
            @if (Auth::user()->id == $reservation->user_id)
                @php
                    $endDate = strtotime($reservation->end_date);
                    $today = strtotime(date('Y-m-d'));
                    $flicker = $endDate <= $today ? 'flicker' : '';
                @endphp
                <div class="bg-white rounded-lg shadow-lg p-4 {{ $flicker }}">
                    @foreach($rooms as $room)
                        @if($reservation->room_id == $room->id)
                            <p class="text-xl font-bold mb-2">Room: {{ $room->number }}</p>
                            <p class="font-semibold mb-2">Start Date: {{ $reservation->start_date }}</p>
                            <p class="font-semibold">End Date: {{ $reservation->end_date }}</p>
                        @endif
                    @endforeach
                    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Cancel Reservation</button>
                    </form>
                </div>
            @endif
        @endforeach
    </div>
</body>
</html>




