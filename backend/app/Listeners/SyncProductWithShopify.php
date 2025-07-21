<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SyncProductWithShopify
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated $event)
    {
        $product = $event->product;
        // Simulate syncing with Shopify
        \Log::info("Simulating sync of product {$product->title} (ID: {$product->id}) with Shopify...");
        // Stub: pretend to make an HTTP request to Shopify
        // Example: $response = Http::post('https://shopify.example.com/api/products', [...]);
        \Log::info("[STUB] Would send product data to Shopify API here.");
    }
}
