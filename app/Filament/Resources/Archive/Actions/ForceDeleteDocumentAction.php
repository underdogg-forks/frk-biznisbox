<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ForceDeleteDocumentAction
{
    public static function make(): Action
    {
        return Action::make('forceDelete')
            ->label('Permanently Delete')
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->requiresConfirmation()
            ->modalHeading('Permanently Delete Document')
            ->modalDescription('Are you sure you want to permanently delete this document? This action cannot be undone.')
            ->action(function (Archive $record) {
                // TODO: Implement actual force delete from ArchiveController@forceDeleteDocument
                // This is a placeholder action
                
                Notification::make()
                    ->title('Document Permanently Deleted')
                    ->body("Document {$record->name} has been permanently deleted")
                    ->warning()
                    ->send();
            });
    }
}
