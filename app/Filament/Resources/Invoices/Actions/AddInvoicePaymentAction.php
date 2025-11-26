<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Models\Invoice;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
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
                    ->prefix('$'),
                Select::make('payment_method')
                    ->label('Payment Method')
                    ->options([
                        'cash' => 'Cash',
                        'bank_transfer' => 'Bank Transfer',
                        'credit_card' => 'Credit Card',
                        'paypal' => 'PayPal',
                        'stripe' => 'Stripe',
                        'other' => 'Other',
                    ])
                    ->required(),
                DatePicker::make('payment_date')
                    ->label('Payment Date')
                    ->default(now())
                    ->required(),
            ])
            ->action(function (Invoice $record, array $data) {
                // TODO: Implement actual payment addition from InvoiceController@addInvoicePayment
                // This is a placeholder action
                
                Notification::make()
                    ->title('Payment Added')
                    ->body("Payment of {$data['amount']} added to invoice {$record->number}")
                    ->success()
                    ->send();
            });
    }
}
