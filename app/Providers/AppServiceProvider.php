<?php

namespace App\Providers;

use App\Models\Registration;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();
        
        // Ambil data pendaftaran untuk ditampilkan di navbar
        view()->composer('layouts.app', function ($view) {
            $registrations = Registration::unarchived()->get();
            $view->with('registrations', $registrations);
        });
    }
}
