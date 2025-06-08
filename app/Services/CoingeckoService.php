<?php

namespace App\Services;

use App\Models\Crypto; // Importa el modelo Crypto para guardar/actualizar datos en la BD
use GuzzleHttp\Client; // Cliente HTTP para hacer llamadas a la API externa
use Illuminate\Support\Facades\Cache; // Cache de Laravel para evitar llamadas repetidas

class CoinGeckoService
{
    protected Client $client; // Cliente HTTP
    protected string $apiUrl = 'https://api.coingecko.com/api/v3/'; // URL base de CoinGecko
    protected ?string $apiKey; // Clave API (opcional)

    public function __construct()
    {
        $this->client = new Client(); // Instancia el cliente HTTP
        $this->apiKey = env('COINGECKO_API_KEY'); // Lee la API key desde el archivo .env
    }

    /**
     * Obtiene el top de criptomonedas desde CoinGecko y lo cachea durante 60 minutos.
     *
     * @return array
     */
    public function getTopCryptos(): array
    {
        try {
            // Intenta recuperar los datos de cache (clave: top_cryptos)
            //return Cache::remember('top_cryptos', now()->addMinutes(60), function () {
                $url = $this->apiUrl . 'coins/markets'; // Endpoint de CoinGecko

                // Realiza la petición GET con parámetros en la query string
                $response = $this->client->get($url, [
                    'query' => [
                        'vs_currency' => 'usd', // Precios en USD
                        'order' => 'market_cap_desc', // Orden por capitalización de mercado descendente
                        'per_page' => 200, // Top 200
                        'page' => 1,
                        'x_cg_demo_api_key' => $this->apiKey, // Clave API
                    ],
                    'headers' => [
                        'accept' => 'application/json', // Aceptar respuesta JSON
                    ],
                ]);

                // Decodifica la respuesta JSON como array asociativo
                return json_decode($response->getBody()->getContents(), true);
            //});
        } catch (\Exception $e) {
            // Si algo falla (API caída, sin conexión, etc.), devuelve un array vacío
            return [];
        }
    }

    /**
     * Sincroniza las criptomonedas del top 100 con la base de datos.
     * Inserta nuevas, actualiza las existentes o elimina las que ya no estan presentes en la llamada según su coingecko_id.
     */
    public function syncCryptosToDatabase(): void
    {
        $cryptos = $this->getTopCryptos();
        $dataToUpsert = [];
        $apiCryptoIds = [];

        foreach ($cryptos as $crypto) {
            $dataToUpsert[] = [
                'coingecko_id' => $crypto['id'],
                'symbol' => $crypto['symbol'],
                'name' => $crypto['name'],
                'image' => $crypto['image'],
                'current_price' => $crypto['current_price'],
                'market_cap' => $crypto['market_cap'],
                'price_change_percentage_24h' => $crypto['price_change_percentage_24h'],
                'updated_at' => now(),
                'created_at' => now(),
            ];

            $apiCryptoIds[] = $crypto['id']; // <--- Recolecta los IDs de la API
        }

        Crypto::upsert(
            $dataToUpsert,
            ['coingecko_id'],
            ['symbol', 'name', 'image', 'current_price', 'market_cap', 'price_change_percentage_24h', 'updated_at']
        );


        //Limpieza: elimina los que ya no están en la API
        Crypto::whereNotIn('coingecko_id', $apiCryptoIds)->delete();

    }
}
