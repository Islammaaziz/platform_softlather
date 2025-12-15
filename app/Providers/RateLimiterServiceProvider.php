<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class RateLimiterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for('contactLimiter', function (Request $request) {
            return Limit::perMinutes(30, 3)
                ->by($request->ip())
                ->response(function () {
                    return back()->withErrors([
                        'error' => 'Vous avez atteint la limite de 3 messages. Réessayez dans 30 minutes.'
                    ]);
                });
        });
    }
}