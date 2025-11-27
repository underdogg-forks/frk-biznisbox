<?php

namespace App\Filament\Resources\Admin\Settings\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class TestEmailAction
{
    public static function make(): Action
    {
        return Action::make('testEmail')
            ->label('Send Test Email')
            ->icon('heroicon-o-envelope')
            ->form([
                TextInput::make('email')
                    ->label('Test Email Address')
                    ->email()
                    ->required()
                    ->default(fn () => auth()->user()->email ?? ''),
            ])
            ->action(function (array $data) {
                // TODO: Implement actual test email from Admin\SettingController@sentTestEmail
                // This is a placeholder action
                
                Notification::make()
                    ->title('Test Email Sent')
                    ->body("Test email has been sent to {$data['email']}")
                    ->success()
                    ->send();
            });
    }
}
