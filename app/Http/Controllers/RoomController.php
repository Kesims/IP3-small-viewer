<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // Display all room
    public function index()
    {
        return view('room.index', [
            "rooms" => Room::all()
        ]);
    }

    // Display single room detail
    public function show($id)
    {
        return view('room.show', [
            "room" => Room::query()->findOrFail($id),
            "employees" => User::query()->where('room_id', $id)->get(),
        ]);
    }

    // Create form
    public function create()
    {
        return view('room.create');
    }

    // Store new room in db
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'phone' => ['min:0', Rule::unique('rooms', 'phone')],
            'no' => ['required', Rule::unique('rooms', 'no')],
        ]);

        Room::create($formFields);
        return redirect()->route('room.index')->with('message', 'Místnost byla úspěšně vytvořena');
    }

    // Edit form
    public function edit($id)
    {
        return view('room.edit', [
            "room" => Room::query()->findOrFail($id),
        ]);
    }

    // Update room in db
    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'phone' => ['min:0', Rule::unique('rooms', 'phone')],
            'no' => ['required', Rule::unique('rooms', 'no')],
        ]);

        $room = Room::query()->findOrFail($id);
        $room->update($formFields);
        return redirect()->route('room.index')->with('message', 'Místnost byla úspěšně upravena');
    }

    // Delete room from db
    public function destroy($id)
    {
        $room = Room::query()->findOrFail($id);
        $room->delete();
        return redirect()->route('room.index')->with('message', 'Místnost byla úspěšně smazána');
    }
}
