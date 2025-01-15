<?php
namespace App\Http\Controllers;

use App\Services\CoinGeckoService;

class CoinGeckoController extends Controller
{
    protected $coinGeckoService;

    public function __construct(CoinGeckoService $coinGeckoService)
    {
        $this->coinGeckoService = $coinGeckoService;
    }

    public function showTopCryptos()
    {
        // Obtenemos las 100 criptomonedas más cotizadas
        $topCryptos = $this->coinGeckoService->getTopCryptos();

        // Pasamos los datos de las criptomonedas a la vista
        return view('dashboard', compact('topCryptos'));
    }
}
