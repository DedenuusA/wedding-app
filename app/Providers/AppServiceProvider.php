<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Wedding;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ✅ paksa HTTPS di production (fix mixed content)
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // ✅ aman walau DB belum siap
        try {
            if (Schema::hasTable('weddings')) {
                View::share('wedding', Wedding::first());
            } else {
                View::share('wedding', null);
            }
        } catch (\Throwable $e) {
            View::share('wedding', null);
        }
    }
}