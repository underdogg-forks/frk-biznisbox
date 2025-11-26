<?php

namespace App\Filament\Resources\OpenBankings\Pages;

use App\Filament\Resources\OpenBankings\OpenBankingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOpenBanking extends EditRecord
{
    protected static string $resource = OpenBankingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
