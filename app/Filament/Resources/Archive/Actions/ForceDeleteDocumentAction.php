<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
use App\Services\ArchiveService;
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
                $archiveService = app(ArchiveService::class);
                
                $result = $archiveService->deleteDocumentPermanently($record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Document could not be deleted permanently')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Document Permanently Deleted')
                    ->body("Document {$record->name} has been permanently deleted")
                    ->warning()
                    ->send();
            });
    }
}
