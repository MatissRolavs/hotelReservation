<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Reservation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
@include('layouts.navigation')
    <div class="container mx-auto py-8 grid grid-cols-2">
        <div class="flex justify-center">
            <img src="https://via.placeholder.com/600x400.png?text=No+Image" alt="Image" class="w-full h-full object-cover">
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col gap-4">
            <form action="{{ route('reservations.store') }}" method="POST" class="flex flex-col">
                @csrf
                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <h1 class="text-3xl font-bold mb-8">Create Reservation for room {{ $room->number }}</h1>
                <div class="flex flex-col gap-2">
                    <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" min="<?php echo date('Y-m-d'); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date:</label>
                    <input type="date" name="end_date" id="end_date" min="<?php echo date('Y-m-d'); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button>
                    <p id="totalPrice"></p>
                </div>
            </form>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <script>
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');
        const totalPriceElement = document.getElementById('totalPrice');

        startDate.addEventListener('change', function() {
            calculateTotalPrice();
        });

        endDate.addEventListener('change', function() {
            calculateTotalPrice();
        });

        function calculateTotalPrice() {
            const start = new Date(startDate.value);
            const end = new Date(endDate.value);

            const days = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
            const totalPrice = days * parseInt({{ $room->price }});

            totalPriceElement.textContent = `Total Price: ${totalPrice}€`;
        }
    </script>
</body>
</html>

