<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;
use App\Models\Reservations;
use App\Models\User;
use App\Models\Rooms;
class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $users = User::all();
        $rooms = Rooms::all();
        $reservations = Reservations::all();

        return view('reservations.index', compact('reservations', 'rooms', 'users'));
    }

    public function userIndex()
    {   $users = User::all();
        $rooms = Rooms::all();
        $reservations = Reservations::all();

        return view('reservations.userIndex', compact('reservations', 'rooms', 'users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {   
        $room = Rooms::find($id);
        $dates = Reservations::select('start_date', 'end_date')->get();
        return view('reservations.create', ['dates' => $dates, 'room' => $room]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationsRequest $request)
    {
        $request->validate([
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
        ]);

        $existingReservations = Reservations::where(function ($query) use ($request) {
            $query->where('start_date', '<=', $request->input('start_date'))
                ->where('end_date', '>=', $request->input('start_date'));
        })
        ->where(function ($query) use ($request) {
            $query->where('start_date', '<=', $request->input('end_date'))
                ->where('end_date', '>=', $request->input('end_date'));
        })
        ->get();

        if ($existingReservations->isNotEmpty()) {
            return redirect()->back()->withInput()->withErrors(['error' => 'It is not possible to reserve a room in this time period.']);
        }

        $reservation = new Reservations();
        $reservation->user_id = auth()->id();
        $reservation->room_id = $request->input('room_id');
        $reservation->start_date = $request->input('start_date');
        $reservation->end_date = $request->input('end_date');
        $reservation->save();

        return redirect()->route('rooms.show', ['room' => $reservation->room_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservations $reservations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservations $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationsRequest $request, Reservations $reservations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservations $reservation)
    {

        $reservation->delete();

        return redirect()->route('reservations.index');
    }
}
