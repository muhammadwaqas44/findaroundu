<?php

namespace App\Providers;

use App\MainCountry;
use App\MainCurrency;
use Illuminate\Support\Facades\Schema;
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

        view()->composer('layout-user.header', function($view){
            $view->with('country',MainCountry::all());
        });

        view()->composer('home.Partials.request_quote_popup',function ($view){
            $view->with('currencies',MainCurrency::all());
        });

        Schema::defaultStringLength('191');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
