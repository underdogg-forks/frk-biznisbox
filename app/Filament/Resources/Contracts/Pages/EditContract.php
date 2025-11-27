<?php

namespace App\Filament\Resources\Contracts\Pages;

use App\Filament\Resources\Contracts\Actions\GenerateContractPdfAction;
use App\Filament\Resources\Contracts\Actions\ShareContractAction;
use App\Filament\Resources\Contracts\ContractResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditContract extends EditRecord
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ShareContractAction::make(),
            GenerateContractPdfAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
