@extends('layout')
@section('content')
    <h1>Vytvořit novou místnost</h1>
    <form method="POST" action="/rooms/store">
        @csrf
        <label for="name">Název</label>
        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}"><br>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="no">Číslo</label>
        <input type="text" name="no" id="no" class="form-control" value="{{old('no')}}"><br>
        @error('no')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="phone">Telefon</label>
        <input type="number" name="phone" id="phone" class="form-control" value="{{old('phone')}}"><br>
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Uložit</button>
    </form>
@endsection
