<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CoinGeckoService;

class SyncCryptosFromApi extends Command
{
    protected $signature = 'cryptos:sync';
    protected $description = 'Sincroniza la tabla cryptos con la API de CoinGecko';

    public function handle(CoinGeckoService $coinGeckoService)
    {
        $coinGeckoService->syncCryptosToDatabase();
        $this->info('Tabla cryptos actualizada correctamente.');
    }
}
