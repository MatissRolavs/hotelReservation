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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-center">
                    <img src="https://via.placeholder.com/600x400.png?text=No+Image" alt="Image" class="mx-auto w-4/5 h-auto object-cover">
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                    <div class="text-center">
                        <p class="text-2xl font-semibold">{{ $room->number }}</p>
                        <p class="text-gray-500">{{ $room->description }}</p>
                        <p class="text-gray-500">{{ $room->price }}€/Per Day</p>
                    </div>
                </div>
            </div>
            @if (Auth::user()->type == 'admin')
                <a href="{{route('rooms.edit', $room)}}">
                    <button type="button" class="mt-4 mx-auto block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto">Edit</button>
                </a>
                <form method="POST" action="{{ route('rooms.destroy', $room) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mt-4 mx-auto block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-auto">Delete</button>
                </form>
            @endif
            <a href="{{route('reservations.create', $room->id)}}">
                <button type="button" class="mt-4 mx-auto block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-auto">Reserve room</button>
            </a>
        </div>

</body>
</html>

    

    

