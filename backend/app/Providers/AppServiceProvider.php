<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Observers\ProductObserver;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {
        $this->app->bind(ShopifyServiceInterface::class, ShopifyService::class);

    }
    public function boot(): void {

        Product::observe(ProductObserver::class);
    }
}
