<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class DownloadDocumentAction
{
    public static function make(): Action
    {
        return Action::make('download')
            ->label('Download')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(function (Archive $record) {
                // TODO: Implement actual download from ArchiveController@downloadDocument
                // This is a placeholder action
                
                $downloadUrl = route('downloadDocument', ['id' => $record->id]);
                
                Notification::make()
                    ->title('Downloading Document')
                    ->body("Downloading {$record->name}")
                    ->success()
                    ->send();
                
                // In actual implementation, this would trigger file download
                return redirect($downloadUrl);
            });
    }
}
