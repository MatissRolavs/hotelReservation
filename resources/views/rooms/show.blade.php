
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $room->number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <p>{{ $room->number }}</p>
                        <p>{{ $room->description }}</p>
                        <p>{{ $room->price }}€</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('rooms.edit', $room)}}">
            <button type="button">Edit</button>
        </a>
        <form method="POST" action="{{ route('rooms.destroy', $room) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <a href="{{route('reservations.create', $room->id)}}">
            <button type="button">Reserve room</button>
        </a>
    </div>


