<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Wedding;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
       
        // paksa HTTPS di production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // gunakan View Composer supaya Auth pasti tersedia
        View::composer('*', function ($view) {
            $wedding = null;

            try {
                // cek tabel wedding ada & user login
                if (Schema::hasTable('weddings') && Auth::check()) {
                    $wedding = Wedding::firstOrCreate(
                        ['kolom3' => Auth::id()],
                        ['slug' => Str::slug(Auth::user()->name.'-'.Auth::id())]
                    );

                    // kalau slug kosong, buat otomatis
                    if (!$wedding->slug) {
                        $wedding->slug = Str::slug(Auth::user()->name.'-'.$wedding->id);
                        $wedding->save();
                    }
                }
            } catch (\Throwable $e) {
                $wedding = null;
            }

            $view->with('wedding', $wedding);
        });
    }
}