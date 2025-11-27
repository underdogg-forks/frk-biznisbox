<?php

namespace App\Filament\Resources\Admin\Settings\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;

class UploadCompanyLogoAction
{
    public static function make(): Action
    {
        return Action::make('uploadLogo')
            ->label('Upload Logo')
            ->icon('heroicon-o-photo')
            ->form([
                FileUpload::make('logo')
                    ->label('Company Logo')
                    ->image()
                    ->required()
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),
            ])
            ->action(function (array $data) {
                // TODO: Implement actual logo upload from Admin\SettingController@setCompanyLogo
                // This is a placeholder action
                
                Notification::make()
                    ->title('Logo Uploaded')
                    ->body('Company logo has been uploaded successfully')
                    ->success()
                    ->send();
            });
    }
}
