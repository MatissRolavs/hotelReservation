<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="grid grid-cols-3 gap-4">
        @foreach ($rooms as $room)
            <div class="bg-white rounded-lg shadow-lg p-4">
                <a href="{{route('rooms.show', $room)}}" class="text-2xl font-bold text-blue-500">{{$room["number"]}}</a>
                <p class="text-gray-500">{{$room["price"]}}€</p>
                <p class="text-gray-500">{{$room["description"]}}</p>
                @if ($room['available'] == 0)
                   <p> available</p>
                @else
                    <p>unavailable</p>
                @endif
            </div>
        @endforeach
    </div>

</body>
</html>



