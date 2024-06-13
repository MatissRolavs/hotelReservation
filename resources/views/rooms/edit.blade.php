<div class="container">
    <h1>Edit Room</h1>
    <form method="POST" action="{{ route('rooms.update', $room) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="number">Number</label>
            <input type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number', $room->number) }}" required>
            @error('number')
                @if (old('number') != $room->number)
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @endif
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $room->price) }}" required>
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $room->description) }}" required>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <input type="hidden" name="available" value="0">
        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>




