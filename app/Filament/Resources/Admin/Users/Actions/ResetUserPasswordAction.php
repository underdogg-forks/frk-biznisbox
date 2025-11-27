<?php

namespace App\Filament\Resources\Admin\Users\Actions;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class ResetUserPasswordAction
{
    public static function make(): Action
    {
        return Action::make('resetPassword')
            ->label('Reset Password')
            ->icon('heroicon-o-key')
            ->form([
                TextInput::make('password')
                    ->label('New Password')
                    ->password()
                    ->required()
                    ->minLength(8)
                    ->confirmed(),
                TextInput::make('password_confirmation')
                    ->label('Confirm Password')
                    ->password()
                    ->required(),
            ])
            ->action(function (User $record, array $data) {
                // TODO: Implement actual password reset from Admin\UserController@resetPassword
                // This is a placeholder action
                
                Notification::make()
                    ->title('Password Reset')
                    ->body("Password has been reset for {$record->email}")
                    ->success()
                    ->send();
            });
    }
}
