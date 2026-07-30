<?php

namespace App\Providers;

use App\Models\NavigationItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer(['partials.navbar', 'partials.footer'], function ($view): void {
            $view->with('navigationLinks', NavigationItem::active()->orderBy('sort_order')->get());
        });
    }
}
