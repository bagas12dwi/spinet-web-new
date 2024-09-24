<?php

namespace App\Providers;

use App\Models\WebSetting;
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
        view()->composer('users.components.footer', function ($view) {
            $view->with([
                'setting' => WebSetting::where('name', 'Kontak')->get()
            ]);
        });
    }
}
