<?php

namespace App\Filament\Resources\OpenBankings\Pages;

use App\Filament\Resources\OpenBankings\OpenBankingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOpenBankings extends ListRecords
{
    protected static string $resource = OpenBankingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
