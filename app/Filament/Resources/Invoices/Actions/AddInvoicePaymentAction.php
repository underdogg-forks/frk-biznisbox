<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Models\Invoice;
use App\Services\InvoiceService;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class AddInvoicePaymentAction
{
    public static function make(): Action
    {
        return Action::make('addPayment')
            ->label('Add Payment')
            ->icon('heroicon-o-currency-dollar')
            ->form([
                TextInput::make('amount')
                    ->label('Payment Amount')
                    ->numeric()
                    ->required()
                    ->prefix(fn (Invoice $record) => $record->currency ?? '$'),
                DatePicker::make('date')
                    ->label('Payment Date')
                    ->default(now())
                    ->required(),
            ])
            ->action(function (Invoice $record, array $data) {
                $invoiceService = app(InvoiceService::class);
                
                $result = $invoiceService->addInvoicePayment($record->id, $data);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Payment could not be added')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Payment Added')
                    ->body("Payment of {$data['amount']} added to invoice {$record->number}")
                    ->success()
                    ->send();
            });
    }
}
