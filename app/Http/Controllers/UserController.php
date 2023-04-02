<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index', [
            "users" => User::with('room')->get(),
        ]);
    }

    public function show($id)
    {
        return view('user.show', [
            "user" => User::query()->findOrFail($id),
            "keys" => Key::query()->where(['user_id' => $id])->get(),
        ]);
    }

    public function create() {
        if(Room::all()->count() == 0)
            return redirect()->route('room.create')->with('message', 'Nejdříve musíte vytvořit místnost');
        return view('user.create', [
            "rooms" => Room::all(),
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required', 'min:3', 'max:255', Rule::unique("users", "username")],
            'password' => ['required', 'confirmed', 'min:8'],
            'administrator' => ['required', 'min:0', 'max:1'],
            'name' => 'required',
            'surname' => 'required',
            'wage' => ['required', 'min:0'],
            'job' => 'required',
            'room_id' => [ 'required', Rule::exists("rooms", "id")],
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        return redirect()->route('user.show', ['id' => $user->id])->with('message', 'Zaměstnanec byl úspěšně vytvořen');
    }

    public function edit($id)
    {
        return view('user.edit', [
            "user" => User::query()->findOrFail($id),
            "rooms" => Room::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'username' => ['required', 'min:3', 'max:255', Rule::unique("users", "username")->ignore($id)],
            'name' => 'required',
            'administrator' => ['required', 'min:0', 'max:1'],
            'surname' => 'required',
            'wage' => ['required', 'min:0'],
            'job' => 'required',
            'room_id' => [ 'required', Rule::exists("rooms", "id")],
        ]);

        $user = User::query()->findOrFail($id);
        $user->update($formFields);
        return redirect()->route('user.show', ['id' => $user->id])->with('message', 'Zaměstnanec byl úspěšně upraven');
    }

    public function destroy($id)
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('message', 'Zaměstnanec byl úspěšně smazán');
    }

    public function changePassword($id) {
        if($id !== auth()->user()->id)
            return redirect()->route('user.index')->with('message', 'Nemáte oprávnění k změně hesla jiného uživatele');
        return view('user.changePassword', [
            "user" => User::query()->findOrFail($id),
        ]);
    }

    public function updatePassword(Request $request, $id) {
        if($id !== auth()->user()->id)
            return redirect()->route('user.index')->with('message', 'Nemáte oprávnění k změně hesla jiného uživatele');
        $formFields = $request->validate([
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::query()->findOrFail($id);
        $user->update($formFields);
        return redirect()->route('user.index', ['id' => $user->id])->with('message', 'Heslo bylo úspěšně změněno');
    }

    public function editKeys($id) {

        $roomsWithKeys = Key::query()->where(['user_id' => $id])->get()->map(function($key) {
            return $key->room_id;
        })->toArray();

        return view('user.keys', [
            "user" => User::query()->findOrFail($id),
            "rooms"=> Room::all(),
            "roomsWithKeys" => $roomsWithKeys,]);
    }

    public function updateKeys(Request $request, $id) {
        Key::query()->where(['user_id' => $id])->delete();
        foreach ($request->all() as $key => $value) {
            if($key == '_token') continue;
            $newKey = new Key();
            $newKey->user_id = $id;
            $newKey->room_id = $value;
            $newKey->save();
        }
        return redirect()->route('user.index')->with('message', 'Klíče byly úspěšně změněny');
    }
}
