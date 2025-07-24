<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;
use App\Models\VisitorLog;
use Illuminate\Support\Facades\URL;

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
    public function boot()
    {
        // Mendapatkan environment saat ini
        // $env = app()->environment();

        // // Menampilkan environment
        // return dd($env);
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        // Jangan log saat di dashboard admin atau URL mengandung '/admin'
        if (
            app()->runningInConsole() === false &&
            !Request::is('api/*') &&
            !str_contains(Request::path(), 'u53k41-1d')
        ) {
            VisitorLog::create([
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent(),
                'visited_url' => Request::url(),
            ]);
        }

    }
}
