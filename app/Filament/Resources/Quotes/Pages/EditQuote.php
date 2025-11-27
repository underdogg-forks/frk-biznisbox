<?php

namespace App\Filament\Resources\Quotes\Pages;

use App\Filament\Resources\Quotes\Actions\ConvertQuoteToInvoiceAction;
use App\Filament\Resources\Quotes\Actions\SendQuoteNotificationAction;
use App\Filament\Resources\Quotes\Actions\ShareQuoteAction;
use App\Filament\Resources\Quotes\QuoteResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditQuote extends EditRecord
{
    protected static string $resource = QuoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ConvertQuoteToInvoiceAction::make(),
            ShareQuoteAction::make(),
            SendQuoteNotificationAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
