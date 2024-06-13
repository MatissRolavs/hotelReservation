<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navigation')
    <div class="grid grid-cols-3 gap-4">
        @foreach ($rooms as $room)
            <div class="group bg-white rounded-lg shadow-lg p-4">
                <a href="{{route('rooms.show', $room)}}">
                    <div class="w-full h-48 relative overflow-hidden">
                        <img src="https://via.placeholder.com/600x400.png?text=No+Image" alt="Image" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h2 class="text-2xl font-bold text-blue-500 line-clamp-1 overflow-hidden">{{Str::limit($room["number"], 10, '...')}}</h2>
                        <p class="text-gray-500 line-clamp-1 overflow-hidden">{{Str::limit($room["price"], 10, '...')}}€/Per Day</p>
                        <p class="text-gray-500 line-clamp-2 overflow-hidden">{{Str::limit($room["description"], 20, '...')}}</p>
                        @if ($room['available'] == 0)
                            <p class="text-green-500">available</p>
                        @else
                            <p class="text-red-500">unavailable</p>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>

</body>
</html>



