<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinGeckoController;
use App\Http\Controllers\TradingViewController;
use App\Http\Controllers\CryptoFavoriteController;

// Ruta pública (inicio)
Route::get('/', [CoinGeckoController::class, 'showWelcome']);

// Grupo de rutas protegidas por autenticación y verificación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard con filtro (usa solo esta para el listado principal)
    Route::get('/dashboard', [CoinGeckoController::class, 'showTopCryptos'])->name('dashboard');

    // Vista de detalle de una cripto
    Route::get('/tradingview/{symbol}', [TradingViewController::class, 'show'])->name('tradingview');

    // Marcar/desmarcar favoritos (AJAX)
    Route::post('/favorites/toggle', [CryptoFavoriteController::class, 'toggle'])->name('favorites.toggle');
});
