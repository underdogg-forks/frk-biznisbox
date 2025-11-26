<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
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
                // TODO: Implement actual restore from ArchiveController@restoreDocument
                // This is a placeholder action
                
                Notification::make()
                    ->title('Document Restored')
                    ->body("Document {$record->name} has been restored")
                    ->success()
                    ->send();
            });
    }
}
