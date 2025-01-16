<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinGeckoController;

// Ruta de inicio (página principal)
Route::get('/', function () {
    return view('welcome');
});

// Grupo de rutas protegidas que requieren autenticación
Route::middleware([
    'auth:sanctum',  // Asegura que el usuario esté autenticado usando Sanctum
    config('jetstream.auth_session'),  // Middleware adicional de Jetstream para gestionar la sesión
    'verified',  // Asegura que el correo del usuario esté verificado
])->group(function () {
    // Ruta protegida para acceder al dashboard
    Route::get('/dashboard', [CoinGeckoController::class, 'showTopCryptos'])->name('dashboard');
});
