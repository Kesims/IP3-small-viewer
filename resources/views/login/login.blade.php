@extends('layout')

@section('content')

<h1>Přihlášení</h1>
<form method="POST" action="/login">
    @csrf
    <label for="username">Uživatelské jméno</label>
    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}"><br>
    @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="password">Heslo</label>
    <input type="password" name="password" id="password" class="form-control"><br>
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit">Přihlásit</button>
</form>

@endsection
