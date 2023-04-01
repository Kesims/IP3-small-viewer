<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Small Viewer</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/rooms">Místnosti</a></li>
            <li><a href="/users">Lidé</a></li>
            @auth
            <li><form class="inline" method="GET" action="/users/{{auth()->user()->id}}/change-password">
                    @csrf
                    <button type="submit">Změnit heslo</button>
                </form>
            </li>
            <li><form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">Odhlásit se</button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>
    <x-flashmessage />
    @yield('content')
</body>
</html>
