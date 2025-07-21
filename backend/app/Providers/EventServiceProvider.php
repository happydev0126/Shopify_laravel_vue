<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\ProductCreated;
use App\Listeners\SyncProductWithShopify;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ProductCreated::class => [
            SyncProductWithShopify::class,
        ],
    ];
    public function boot(): void {}
} 