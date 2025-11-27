<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Models\Quote;
use App\Services\QuoteService;
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
                $quoteService = app(QuoteService::class);
                
                $result = $quoteService->convertQuoteToInvoice($record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Quote could not be converted to invoice')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Quote Converted')
                    ->body("Quote {$record->number} has been converted to an invoice")
                    ->success()
                    ->send();
                
                return $result;
            });
    }
}
