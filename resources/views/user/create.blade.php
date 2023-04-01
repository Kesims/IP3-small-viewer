@extends('layout')
@section('content')
    <h1>Nový zaměstnanec</h1>
    <form action="/users/store" method="post">
        @csrf
        <label for="username">Uživatelské jméno</label>
        <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}"><br>
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password">Heslo</label>
        <input type="password" name="password" id="password" class="form-control"><br>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password_confirmation">Heslo znovu</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"><br>
        @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="administrator">Administrátor</label>
        <select name="administrator" id="administrator">
            <option value="1" @if(old('administrator') === "1")selected="selected"@endif>Ano</option>
            <option value="0" @if(old('administrator') === "0")selected="selected"@endif>Ne</option>
        </select><br>
        @error('administrator')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="name">Jméno</label>
        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}"><br>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="surname">Příjmení</label>
        <input type="text" name="surname" id="surname" class="form-control" value="{{old('surname')}}"><br>
        @error('surname')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="job">Zaměstnání</label>
        <input type="text" name="job" id="job" class="form-control" value="{{old('job')}}"><br>
        @error('job')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="wage">Plat</label>
        <input type="number" name="wage" id="wage" class="form-control" value="{{old('wage')}}"><br>
        @error('wage')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="room_id">Místnost</label>
        <select name="room_id" id="room_id" class="form-control" >
            @foreach($rooms as $room)
                <option value="{{$room->id}}"
                @if($room->id == old('room_id'))
                    selected="selected"
                @endif
                >{{$room->name}}</option>
            @endforeach
        </select><br>
        @error('room_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Uložit</button>
    </form>
@endsection
