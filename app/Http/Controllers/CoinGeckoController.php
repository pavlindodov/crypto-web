<?php

namespace App\Http\Controllers;

use App\Models\Crypto;

class CoinGeckoController extends Controller
{
    // Obtener criptomonedas desde la base de datos
    private function getTopCryptosData()
    {
        return Crypto::orderByDesc('market_cap')->take(200)->get();
    }

    // Dashboard
    public function showTopCryptos()
    {
        $topCryptos = $this->getTopCryptosData();
        return view('dashboard', compact('topCryptos'));
    }

    // Página de bienvenida
    public function showWelcome()
    {
        $topCryptos = $this->getTopCryptosData();
        return view('welcome', compact('topCryptos'));
    }
}
