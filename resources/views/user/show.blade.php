@extends('layout')

@section('content')
    <h1>Karta osoby {{$user->name}} {{$user->surname}}</h1>
    <dl>
        <dt>Uživatelské jméno</dt>
        <dd>{{$user->username}}</dd>

        <dt>Pozice</dt>
        <dd>{{$user->job}}</dd>

        <dt>Mzda</dt>
        <dd>{{$user->wage}}</dd>

        <dt>Místnost</dt>
        <dd>
            @if(empty($user->room))
                ---
            @else
                <a href="/rooms/{{$user->room->id}}">{{$user->room->name}}</a>
            @endif
        </dd>

        <dt>Klíče</dt>
        @if($keys->isEmpty())
            ---
        @else
            @foreach($keys as $key)
                <dd><a href="/rooms/{{$key->room->id}}">{{$key->room->name}}</dd>
            @endforeach
        @endif
    </dl>
@endsection
