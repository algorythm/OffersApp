<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      \Braintree_Configuration::environment('sandbox');
      \Braintree_Configuration::merchantId('2w65xqt5cjv8ktz6');
      \Braintree_Configuration::publicKey('s7bt4q44r7r8kvzz');
      \Braintree_Configuration::privateKey('db8a9ab92338eaf9e73bafcd07eefc51');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
