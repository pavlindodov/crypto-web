<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Illuminate\Http\Request;

class CoinGeckoController extends Controller
{
    // Obtener criptomonedas desde la base de datos
    private function getTopCryptosData()
    {
        return Crypto::orderByDesc('market_cap')->take(200)->get();
    }

    // Dashboard con filtro ALL/Favorites
    public function showTopCryptos(Request $request)
    {
        $showFavorites = $request->input('filter') === 'favorites';

        $cryptos = $showFavorites
            ? auth()->user()->favoriteCryptos()->orderByDesc('market_cap')->get()
            : $this->getTopCryptosData();

        return view('dashboard', [
            'cryptos' => $cryptos,
            'showFavorites' => $showFavorites,
        ]);
    }


    // Página de bienvenida
    public function showWelcome()
    {
        $cryptos = $this->getTopCryptosData();
        return view('welcome', compact('cryptos'));
    }
}
