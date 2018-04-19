<?php

namespace MrPiatek\BlueClient\Providers;


use Illuminate\Support\ServiceProvider;

class BlueClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
    }
}
