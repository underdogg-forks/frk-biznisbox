<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Models\Quote;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class SendQuoteNotificationAction
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
            ->action(function (Quote $record, array $data) {
                // TODO: Implement actual send notification from QuoteController@sendQuoteNotification
                // This is a placeholder action
                
                Notification::make()
                    ->title('Quote Notification Sent')
                    ->body("Notification sent to {$data['email']}")
                    ->success()
                    ->send();
            });
    }
}
