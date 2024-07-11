<?php

use Illuminate\Support\Facades\Route;
use App\Models\Bet;
use App\Models\game;
use App\Http\Controllers\BetController;

Route::get('/', function () {
    $bets = Bet::all();
    $games = game::all();
    $bets_gamers = Bet::whereHas('game', function ($query) {
        $query->where('cantidad_jugadores', '>', 3);
    })->get();
    $bets_cards_total = Bet::whereHas('game', function ($query) {
        $query->where('juego_cartas', 1);
    })->sum('monto');
    $bets_non_cards_total = Bet::whereHas('game', function ($query) {
        $query->where('juego_cartas', 0);
    })->sum('monto');
    return view('examen.examen', ['bets' => $bets, 'bets_gamers' => $bets_gamers, 'bets_cards_total' => $bets_cards_total, 'bets_non_cards_total' => $bets_non_cards_total, 'games' => $games]);
});

route::post('/bet', [BetController::class, 'store']);
