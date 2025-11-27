<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Models\Quote;
use App\Services\QuoteService;
use Filament\Actions\Action;

class ConvertQuoteToInvoiceAction
{
    use HandlesNotifications;

    public static function make(): Action
    {
        return Action::make('convertToInvoice')
            ->label('Convert to Invoice')
            ->icon('heroicon-o-arrow-path')
            ->requiresConfirmation()
            ->action(function (Quote $record) {
                $quoteService = app(QuoteService::class);
                $result       = $quoteService->convertQuoteToInvoice($record->id);

                if (! $result) {
                    static::notifyError('Error', 'Quote could not be converted to invoice');

                    return;
                }

                static::notifySuccess(
                    'Quote Converted',
                    "Quote {$record->number} has been converted to an invoice"
                );

                return $result;
            });
    }
}
