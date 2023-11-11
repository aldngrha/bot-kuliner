<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZomatoService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.zomato.api_key');
    }

    public function searchRestaurants($city)
    {
        $response = Http::get('https://developers.zomato.com/api/v2.1/search', [
            'q' => $city,
        ], [
            'user-key' => $this->apiKey,
        ]);

        return $response->json();
    }
}
