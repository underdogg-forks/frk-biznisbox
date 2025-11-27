<?php

namespace App\Filament\Resources\Admin\Currencies\Pages;

use App\Filament\Resources\Admin\Currencies\CurrencyResource;
use App\Filament\Resources\Admin\Settings\Actions\UpdateCurrencyRatesAction;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCurrencies extends ListRecords
{
    protected static string $resource = CurrencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            UpdateCurrencyRatesAction::make(),
            CreateAction::make(),
        ];
    }
}
