<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'q3j79rkh94sgyk6r',
                    'publicKey' => 'k68gdbppsnm3xh9h',
                    'privateKey' => 'df1b03fe3ce2e4eade9a3f7df864147b'
                ]
            );
        });
    }
}