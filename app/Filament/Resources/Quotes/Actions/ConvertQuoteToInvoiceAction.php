<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Models\Quote;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ConvertQuoteToInvoiceAction
{
    public static function make(): Action
    {
        return Action::make('convertToInvoice')
            ->label('Convert to Invoice')
            ->icon('heroicon-o-arrow-path')
            ->requiresConfirmation()
            ->action(function (Quote $record) {
                // TODO: Implement actual conversion from QuoteController@convertQuoteToInvoice
                // This is a placeholder action
                
                Notification::make()
                    ->title('Quote Converted')
                    ->body("Quote {$record->number} will be converted to an invoice")
                    ->success()
                    ->send();
                
                // In actual implementation, this would create an Invoice from the Quote
            });
    }
}
