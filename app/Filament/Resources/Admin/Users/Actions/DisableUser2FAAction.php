<?php

namespace App\Filament\Resources\Admin\Users\Actions;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class DisableUser2FAAction
{
    public static function make(): Action
    {
        return Action::make('disable2fa')
            ->label('Disable 2FA')
            ->icon('heroicon-o-shield-exclamation')
            ->requiresConfirmation()
            ->modalHeading('Disable Two-Factor Authentication')
            ->modalDescription('Are you sure you want to disable 2FA for this user?')
            ->action(function (User $record) {
                // TODO: Implement actual 2FA disable from Admin\UserController@disable2fa
                // This is a placeholder action
                
                Notification::make()
                    ->title('2FA Disabled')
                    ->body("Two-factor authentication has been disabled for {$record->email}")
                    ->warning()
                    ->send();
            });
    }
}
