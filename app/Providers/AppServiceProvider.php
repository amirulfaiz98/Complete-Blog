<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Suppoer\Facades\Schema; // Support MariaDB

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191); //Support MariaDB
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
