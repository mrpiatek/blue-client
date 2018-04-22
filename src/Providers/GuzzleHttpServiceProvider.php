<?php

namespace MrPiatek\BlueClient\Providers;


use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class GuzzleHttpServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '../config/blue-server-config.php' => config_path('blue-server-config.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('GuzzleHttp\Client', function () {
            return new Client([
                'base_uri' => config('blue-server-config.base-uri'),
                'timeout' => config('blue-server-config.timeout'),
            ]);
        });
    }
}