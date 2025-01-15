<?php
namespace App\Services;

use GuzzleHttp\Client;

class CoinGeckoService
{
    protected $client;
    protected $apiUrl = 'https://api.coingecko.com/api/v3/';
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('COINGECKO_API_KEY'); // Leer la clave API desde .env
    }

    public function getTopCryptos()
    {
        try {
            // Construimos la URL completa, incluyendo la clave API como parte de la query string
            $url = $this->apiUrl . 'coins/markets';

            $response = $this->client->get($url, [
                'query' => [
                    'x_cg_demo_api_key' => $this->apiKey, // Incluir la clave demo en la query string
                    'vs_currency' => 'usd',
                    'order' => 'market_cap_desc',
                    'per_page' => 100,
                    'page' => 1,
                ],
                'headers' => [
                    'accept' => 'application/json',
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Si ocurre un error, retornamos un arreglo vacío
            return [];
        }
    }
}
