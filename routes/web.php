<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomPicturesController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ReservationsController;    
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/room-pictures', [RoomPicturesController::class, 'index'])->name('room_pictures.index');

    Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/create', [RoomsController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomsController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{room}', [RoomsController::class, 'show'])->name('rooms.show');
    Route::get('/rooms/{room}/edit', [RoomsController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{room}', [RoomsController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{room}', [RoomsController::class, 'destroy'])->name('rooms.destroy');

    Route::get('/reservations/create/{room}', [ReservationsController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationsController::class, 'store'])->name('reservations.store');
    Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations.index');

});

require __DIR__.'/auth.php';
