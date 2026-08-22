<?php

namespace App\Providers;

use App\Models\Payment;
use Illuminate\Support\Facades\URL;
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
        if (env('APP_ENV') === 'production' || env('FORCE_HTTPS')) {
            URL::forceScheme('https');
        }

        // Shares the pending-payments count with the admin sidebar badge.
        View::composer('components.layouts.admin', function ($view) {
            $view->with('pendingPaymentsCount', Payment::where('status', 'pending')->count());
        });
    }
}
