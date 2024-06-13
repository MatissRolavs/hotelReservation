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
<div class="container mx-auto flex items-center justify-center h-screen">
    <div class="w-1/3">
        <div class="card mx-auto">
            <div class="card-header">Create Room</div>

            <div class="card-body">
                <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data" class="px-8 py-6">
                    @csrf

                    <input type="hidden" name="available" value="0">

                    <div class="mb-4">
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number</label>
                        <input id="number" type="number" class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>
                        @error('number')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price Per Day</label>
                        <input id="price" type="number" class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm" name="price" value="{{ old('price') }}" required autocomplete="price">
                        @error('price')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input id="description" type="text" class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm" name="description" value="{{ old('description') }}" required autocomplete="description">
                        @error('description')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="img_path" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Picture</label>
                        <input id="img_path" type="text" class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm" name="img_path" value="{{ old('img_path') }}" required>
                        @error('img_path')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="py-2 px-4 bg-indigo-500 text-white rounded-md">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>


