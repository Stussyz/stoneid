<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Middleware\RoleMiddleware;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app('router')->aliasMiddleware('role', RoleMiddleware::class);

    }
}
