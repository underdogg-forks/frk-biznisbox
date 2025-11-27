<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Models\Invoice;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class SendInvoiceNotificationAction
{
    public static function make(): Action
    {
        return Action::make('sendNotification')
            ->label('Send Notification')
            ->icon('heroicon-o-envelope')
            ->form([
                TextInput::make('email')
                    ->label('Recipient Email')
                    ->email()
                    ->required(),
            ])
            ->action(function (Invoice $record, array $data) {
                // TODO: Implement actual send notification from InvoiceController@sendInvoiceNotification
                // This is a placeholder action
                
                Notification::make()
                    ->title('Invoice Notification Sent')
                    ->body("Notification sent to {$data['email']}")
                    ->success()
                    ->send();
            });
    }
}
