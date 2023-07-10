<?php

namespace App\Providers;

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
        /* Al agregar esta línea, la paginación de Laravel utilizará el estilo de paginación
         de Bootstrap en lugar del estilo predeterminado (Tailwind CSS) */

        Paginator::useBootstrap();
    }
}
