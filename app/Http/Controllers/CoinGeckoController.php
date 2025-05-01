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

    // Método para el dashboard
    public function showTopCryptos()
    {
        $topCryptos = $this->getTopCryptosData();
        return view('dashboard', compact('topCryptos'));
    }

    // Método para la página de bienvenida
    public function showWelcome()
    {
        $topCryptos = $this->getTopCryptosData();
        return view('welcome', compact('topCryptos'));
    }

    // Método privado reutilizable
    private function getTopCryptosData()
    {
        return $this->coinGeckoService->getTopCryptos();
    }
}
