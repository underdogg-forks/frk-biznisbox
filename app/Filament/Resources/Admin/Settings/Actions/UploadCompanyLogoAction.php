<?php

namespace App\Filament\Resources\Admin\Settings\Actions;

use App\Services\Admin\SettingService;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class UploadCompanyLogoAction
{
    public static function make(): Action
    {
        return Action::make('uploadLogo')
            ->label('Upload Logo')
            ->icon('heroicon-o-photo')
            ->form([
                FileUpload::make('company_logo')
                    ->label('Company Logo')
                    ->image()
                    ->required()
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg']),
            ])
            ->action(function (array $data) {
                $settingService = app(SettingService::class);
                
                $request = new Request();
                $request->files->set('company_logo', $data['company_logo']);
                
                $result = $settingService->setCompanyLogo($request);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Logo could not be uploaded')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Logo Uploaded')
                    ->body('Company logo has been uploaded successfully')
                    ->success()
                    ->send();
            });
    }
}
