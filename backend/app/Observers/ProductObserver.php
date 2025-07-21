<?php

namespace App\Observers;

use App\Models\Product;
use App\Events\ProductCreated;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product)
    {
        \Log::info("Product created locally: {$product->title} (ID: {$product->id})");
        event(new ProductCreated($product));
    }

}
