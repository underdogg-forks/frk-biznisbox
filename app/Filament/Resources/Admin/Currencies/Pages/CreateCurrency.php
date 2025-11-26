<?php

namespace App\Filament\Resources\Admin\Currencies\Pages;

use App\Filament\Resources\Admin\Currencies\CurrencyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCurrency extends CreateRecord
{
    protected static string $resource = CurrencyResource::class;
}
