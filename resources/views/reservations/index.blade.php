<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index page</title>
</head>
<body>
    <h1>Reservations</h1>
    <ul>
        @foreach($reservations as $reservation)
            @foreach($users as $user)
                @if($reservation->user_id == $user->id)
                    <li>Users Email - {{$user->email}}</li>
                @endif
        @endforeach
            @foreach($rooms as $room)
                @if($reservation->room_id == $room->id)
                    <li>Room - {{ $room->number }}</li>
                @endif
            @endforeach
        @endforeach
    </ul>
</body>
</html>
