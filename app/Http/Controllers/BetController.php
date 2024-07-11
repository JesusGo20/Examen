<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bet;

class BetController extends Controller
{
    //
    function store(Request $request)
    {
        $bet = new Bet();
        $bet->monto = $request->monto;
        $bet->game_id = $request->juego;
        $bet->fecha = $request->fecha;
        $bet->save();
        return redirect('/');
    }
}
