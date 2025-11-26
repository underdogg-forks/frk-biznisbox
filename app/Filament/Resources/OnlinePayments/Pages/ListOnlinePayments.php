<?php

namespace App\Filament\Resources\OnlinePayments\Pages;

use App\Filament\Resources\OnlinePayments\OnlinePaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOnlinePayments extends ListRecords
{
    protected static string $resource = OnlinePaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
