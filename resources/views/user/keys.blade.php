@extends('layout')
@section('content')
    <h1>Změnit klíče uživatele {{$user->name}} {{$user->surname}}</h1>
    <form method="POST" action="/users/{{$user->id}}/update-keys">
        @csrf
        @foreach($rooms as $room)
            <label for="room_{{$room->id}}">{{$room->name}}</label>
            <input type="checkbox" name="room_{{$room->id}}" id="room_{{$room->id}}" value="{{$room->id}}"
                   @if(old("room_".$room->id) && old("room_".$room->id) == "on")
                       checked="checked"
                   @elseif(in_array($room->id, $roomsWithKeys))
                       checked="checked"
                   @endif><br>
        @endforeach
        <button type="submit" class="btn btn-primary mt-3">Změnit klíče</button>
    </form>
@endsection
