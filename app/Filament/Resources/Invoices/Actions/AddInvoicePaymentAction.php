<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;

class AddInvoicePaymentAction
{
    use HandlesNotifications;

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
                $result         = $invoiceService->addInvoicePayment($record->id, $data);

                if (! $result) {
                    static::notifyError('Error', 'Payment could not be added');

                    return;
                }

                static::notifySuccess(
                    'Payment Added',
                    "Payment of {$data['amount']} added to invoice {$record->number}"
                );
            });
    }
}
