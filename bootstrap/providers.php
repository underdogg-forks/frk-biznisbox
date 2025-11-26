<?php

use App\Providers\Filament\AdminPanelProvider;
use App\Providers\Filament\ClientPanelProvider;

return [
    App\Providers\AliasServiceProvider::class,
    App\Providers\AppServiceProvider::class,
    AdminPanelProvider::class,
    ClientPanelProvider::class,
    Barryvdh\DomPDF\ServiceProvider::class,
    Milon\Barcode\BarcodeServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    Laravel\Passport\PassportServiceProvider::class,
];
