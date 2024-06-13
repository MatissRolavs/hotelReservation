<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')
    <div class="container flex items-center justify-center min-h-screen">
        <div class="form-container w-full max-w-md flex-col gap-4">
            <h1 class="text-2xl font-bold">Edit Room</h1>
            <form method="POST" action="{{ route('rooms.update', $room) }}" class="mt-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number</label>
                    <input type="number" class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm" id="number" name="number" value="{{ old('number', $room->number) }}" required>
                    @error('number')
                        @if (old('number') != $room->number)
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price Per Day</label>
                    <input type="number" class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm" id="price" name="price" value="{{ old('price', $room->price) }}" required>
                    @error('price')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm" id="description" name="description" value="{{ old('description', $room->description) }}" required>
                    @error('description')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="available" value="0">

                <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md">Update</button>
            </form>
        </div>

    </div>


