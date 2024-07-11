<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    
    <h1>Todas las apuestas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Juego</th>
                <th>Fecha</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bets as $bet)
                <tr>
                    <td>{{ $bet->id }}</td>
                    <td>{{ $bet->game->nombre }}</td>
                    <td>{{ $bet->fecha }}</td>
                    <td>{{ $bet->monto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Apuestas en juego de mas de 3 jugadores</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Juego</th>
                <th>Fecha</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bets_gamers as $bet_gamer)
                <tr>
                    <td>{{ $bet_gamer->id }}</td>
                    <td>{{ $bet_gamer->game->nombre }}</td>
                    <td>{{ $bet_gamer->fecha }}</td>
                    <td>{{ $bet_gamer->monto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Cantidad total de apuestas</h1>
    <table>
        <thead>
            <tr>
                <th>Juego de Cartas</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>SI</td>
                <td>{{ $bets_cards_total }}</td>
            </tr>
            <tr>
                <td>NO</td>
                <td>{{ $bets_non_cards_total }}</td>
            </tr>
        </tbody>
    </table>

    <h1>Crear nueva apuesta</h1>
    <form action="/bet" method="POST">
        @csrf
        <div>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha">
        </div>
        <div>
            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto">
        </div>
        <div>
            <label for="juego">Juego:</label>
            <select id="juego" name="juego">
                @foreach ($games as $game)
                    <option value="{{ $game->id }}">{{ $game->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Crear</button>
    </form>

</body>

</html>
