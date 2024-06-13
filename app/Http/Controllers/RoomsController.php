<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use App\Models\Rooms;
use App\Models\Room_pictures;
class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Rooms::all();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomsRequest $request)
    {
        $room = new Rooms();
        $room->number = $request->input('number');
        $room->description = $request->input('description');
        $room->price = $request->input('price');
        $room->img_path = $request->input('img_path');
        $room->save();

        //Store room pictures
        

        return redirect()->route('rooms.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Rooms $room)
    {   
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rooms $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomsRequest $request, Rooms $room)
    {
        $room->update($request->only(['number', 'description', 'price', 'available', 'img_path']));
        return redirect()->route('rooms.index');
    }
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rooms $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
