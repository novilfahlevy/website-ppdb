<?php

namespace App\Providers;

use App\Models\Registration;
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
        // Ambil data pendaftaran untuk ditampilkan di navbar
        view()->composer('layouts.app', function ($view) {
            $registrations = Registration::all();
            $view->with('registrations', $registrations);
        });
    }
}
