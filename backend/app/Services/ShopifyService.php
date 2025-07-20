<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Services\ShopifyServiceInterface;


class ShopifyService implements ShopifyServiceInterface
{
    protected $client;
    protected $shop;
    protected $token;

    public function __construct()
    {
        $this->shop = config('services.shopify.shop');
        $this->token = config('services.shopify.token');

        $this->client = new Client([
            'base_uri' => "https://{$this->shop}.myshopify.com/admin/api/2023-07/",
            'headers' => [
                'X-Shopify-Access-Token' => $this->token,
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getProducts(): array
    {
        $response = $this->client->get('products.json');
        return json_decode($response->getBody()->getContents(), true);
    }
} 