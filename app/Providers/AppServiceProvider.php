<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('components.card', 'card');
        Blade::component('components.alert', 'alert');
        Blade::component('components.cardbox', 'cardbox');
        Blade::component('components.breadcumb', 'breadcumb');
        Blade::component('components.breadc_item', 'breadc_item');
        Blade::component('components.breadc_active', 'breadc_active');
    }
}
