<?php

namespace App\Filament\Resources\Admin\Settings\Actions;

use Filament\Actions\Action;
use Filament\Notifications\Notification;

class RemoveCompanyLogoAction
{
    public static function make(): Action
    {
        return Action::make('removeLogo')
            ->label('Remove Logo')
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->requiresConfirmation()
            ->modalHeading('Remove Company Logo')
            ->modalDescription('Are you sure you want to remove the company logo?')
            ->action(function () {
                // TODO: Implement actual logo removal from Admin\SettingController@removeCompanyLogo
                // This is a placeholder action
                
                Notification::make()
                    ->title('Logo Removed')
                    ->body('Company logo has been removed')
                    ->warning()
                    ->send();
            });
    }
}
