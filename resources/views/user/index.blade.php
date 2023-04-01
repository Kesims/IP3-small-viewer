@extends('layout')

@section('content')

    <div>
        <a class="btn btn-primary" href="/users/create">Nový uživatel</a>
    </div>
    <table class="table table-striped mt-3">
        <th>Jméno</th>
        <th>Zaměstnání</th>
        <th>Telefon</th>
        <th>Místnost</th>
        <th colspan="2">Akce</th>
        @foreach($users as $user)
            <tr>
                <td><a href="/users/{{$user->id}}">{{$user->name}} {{$user->surname}}</a></td>
                <td>{{$user->job}}</td>
                @if(isset($user->room->phone))
                <td>{{$user->room->phone}}</td>
                @endif
                <td><a href="/rooms/{{$user->room->id}}">{{$user->room->name}}</a></td>
                <td>
                    <form method="GET" action="/users/{{$user->id}}/keys">
                        @csrf
                        <input type="submit" class="btn btn-info" value="Změnit klíče">
                    </form>
                </td>
                <td>
                    <form method="GET" action="/users/{{$user->id}}/edit">
                        @csrf
                        <input type="submit" class="btn btn-info" value="Upravit">
                    </form>
                </td>
                <td>
                    <form method="POST" action="/users/{{$user->id}}/delete">
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Odstranit" onclick="return confirm('Opravdu chcete smazat zaměstnance?')">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
