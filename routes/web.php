<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinGeckoController;
use App\Http\Controllers\TradingViewController;
use App\Http\Controllers\CryptoFavoriteController;

// Ruta pública (inicio)
Route::get('/', [CoinGeckoController::class, 'showWelcome']);

// Grupo de rutas protegidas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard y otras rutas privadas
    Route::get('/dashboard', [CoinGeckoController::class, 'showTopCryptos'])->name('dashboard');
    Route::get('/tradingview/{symbol}', [TradingViewController::class, 'show'])->name('tradingview');
    Route::post('/favorites/toggle', [CryptoFavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/dashboard/filter', [CoinGeckoController::class, 'filterCryptos'])->name('dashboard.filter');
});
