@extends('layout')

@section('content')
    <h1>Detail místnosti {{$room->no}}</h1>
    <dl>
        <dt>Název</dt>
        <dd>{{$room->name}}</dd>

        <dt>Číslo</dt>
        <dd>{{$room->no}}</dd>


        <dt>Telefon</dt>
        <dd>
            @if(empty($room->phone))
                ---
            @else
                {{$room->phone}}
            @endif
        </dd>

        <dt>Lidé</dt>
        @if(empty($employees))
            ---
        @else
            @foreach($employees as $employee)
                <dd><a href="/users/{{$employee->id}}">{{$employee->name}} {{$employee->surname}}</dd>
            @endforeach
        @endif
    </dl>
@endsection
