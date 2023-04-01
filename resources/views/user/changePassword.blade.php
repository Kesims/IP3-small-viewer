@extends('layout')
@section('content')
    <form method="POST" action="/users/{{auth()->user()->id}}/update-password">
        @csrf
        <label for="password">Nové heslo</label>
        <input type="password" name="password" id="password" class="form-control"><br>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="password_confirmation">Nové heslo znovu</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"><br>
        @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Změnit heslo</button>
@endsection
