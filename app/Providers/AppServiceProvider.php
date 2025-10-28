<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\ShopingCartRepository;
use App\Repositories\ShopingCartRepositoryInterface;// ✅ Make sure this line exists

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // ✅ This fixes the migration error
    }


    public function register(): void
    {
        $this->app->bind(ShopingCartRepositoryInterface::class, ShopingCartRepository::class);
    }
}
