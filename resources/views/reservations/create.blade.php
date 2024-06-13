<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Reservation</title>
</head>
<body>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <label for="start_date">Start Date:</label>
        <?php $room_id = Request::segment(3); ?>
        <input type="hidden" name="room_id" value="{{ $room_id }}">
        <input type="date" name="start_date" id="start_date" min="<?php echo date('Y-m-d'); ?>" required><br>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" min="<?php echo date('Y-m-d'); ?>" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>


    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  

