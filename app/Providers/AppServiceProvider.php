<?php

namespace App\Providers;

use App\Models\NavigationItem;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view): void {
            $view->with('siteSettings', SiteSetting::getSettings());
        });

        View::composer(['partials.navbar', 'partials.footer'], function ($view): void {
            $view->with('navigationLinks', NavigationItem::active()->orderBy('sort_order')->get());
        });
    }
}
