<?php

namespace App\Filament\Resources\Admin\Users\Actions;

use App\Models\User;
use App\Services\Admin\UserService;
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
                $userService = app(UserService::class);
                
                $result = $userService->disable2fa($record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('2FA could not be disabled')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('2FA Disabled')
                    ->body("Two-factor authentication has been disabled for {$record->email}")
                    ->warning()
                    ->send();
            });
    }
}
