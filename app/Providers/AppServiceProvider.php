<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illumintae\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Paginator::useBootstrapFive ();
    }
}
