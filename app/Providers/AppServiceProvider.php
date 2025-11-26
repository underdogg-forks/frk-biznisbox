<?php

namespace App\Providers;

use App\Utils\CustomAccessToken;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::useAccessTokenEntity(CustomAccessToken::class);
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::cookie('token');
    }
}
