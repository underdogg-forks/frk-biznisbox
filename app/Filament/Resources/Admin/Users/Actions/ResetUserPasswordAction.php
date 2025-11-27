<?php

namespace App\Filament\Resources\Admin\Users\Actions;

use App\Models\User;
use App\Services\Admin\UserService;
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
                $userService = app(UserService::class);
                
                $result = $userService->resetPassword($record->id, $data);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Password could not be reset')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Password Reset')
                    ->body("Password has been reset for {$record->email}")
                    ->success()
                    ->send();
            });
    }
}
