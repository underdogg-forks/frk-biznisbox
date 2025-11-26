<?php

namespace App\Filament\Resources\OnlinePayments\Pages;

use App\Filament\Resources\OnlinePayments\OnlinePaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditOnlinePayment extends EditRecord
{
    protected static string $resource = OnlinePaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
