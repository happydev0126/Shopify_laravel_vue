<?php
namespace App\Services;

interface ShopifyServiceInterface {
    public function getProducts(): array;
}
