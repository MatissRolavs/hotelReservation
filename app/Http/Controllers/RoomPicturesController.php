<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoom_picturesRequest;
use App\Http\Requests\UpdateRoom_picturesRequest;
use App\Models\Room_pictures;

class RoomPicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomPictures = Room_pictures::all();
        return view('room_pictures.index', compact('roomPictures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room_pictures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoom_picturesRequest $request)
    {
        $roomPicture = new Room_pictures();
        $roomPicture->url = $request->input('url');
        $roomPicture->room_id = $request->input('room_id');
        $roomPicture->save();
        return redirect()->route('room_pictures.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room_pictures $room_picture)
    {
        return view('room_pictures.show', compact('room_picture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room_pictures $room_pictures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoom_picturesRequest $request, Room_pictures $room_pictures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room_pictures $room_pictures)
    {
        //
    }
}
