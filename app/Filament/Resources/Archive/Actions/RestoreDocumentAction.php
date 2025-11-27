<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
use App\Services\ArchiveService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class RestoreDocumentAction
{
    public static function make(): Action
    {
        return Action::make('restore')
            ->label('Restore Document')
            ->icon('heroicon-o-arrow-uturn-left')
            ->requiresConfirmation()
            ->action(function (Archive $record) {
                $archiveService = app(ArchiveService::class);
                
                $result = $archiveService->restoreDocument($record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Document could not be restored')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Document Restored')
                    ->body("Document {$record->name} has been restored")
                    ->success()
                    ->send();
            });
    }
}
