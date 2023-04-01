@extends('layout')

@section('content')

<div>
    <a class="btn btn-primary" href="/rooms/create">Nová místnost</a>
</div>
<table class="table table-striped mt-3">
    <th>Název</th>
    <th>Číslo</th>
    <th>Telefon</th>
    <th colspan="2">Akce</th>
    @foreach($rooms as $room)
    <tr>
        <td><a href="/rooms/{{$room->id}}">{{$room->name}}</a></td>
        <td>{{$room->no}}</td>
        <td>{{$room->phone}}</td>
        <td>
            <form method="get" action="/rooms/{{$room->id}}/edit">
                @csrf
                <input type="submit" class="btn btn-info" value="Upravit">
            </form>
        </td>
        <td>
            <form method="post" action="/rooms/{{$room->id}}/delete">
                @csrf
                <input type="submit" class="btn btn-danger" value="Odstranit" onclick="return confirm('Opravdu chcete smazat místnost?')">
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
