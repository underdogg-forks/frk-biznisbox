<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Milon\Barcode\Facades\DNS1DFacade;
use Milon\Barcode\Facades\DNS2DFacade;

class AliasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Barcode1D', DNS2DFacade::class);
        $loader->alias('Barcode2D', DNS1DFacade::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
