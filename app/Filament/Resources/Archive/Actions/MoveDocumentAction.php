<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
use App\Services\ArchiveService;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;

class MoveDocumentAction
{
    public static function make(): Action
    {
        return Action::make('move')
            ->label('Move Document')
            ->icon('heroicon-o-folder-arrow-down')
            ->form([
                Select::make('folder_id')
                    ->label('Move to Folder')
                    ->required()
                    ->options([
                        1 => 'Documents',
                        2 => 'Images',
                        3 => 'Contracts',
                        4 => 'Invoices',
                        5 => 'Other',
                    ]),
            ])
            ->action(function (Archive $record, array $data) {
                $archiveService = app(ArchiveService::class);
                
                $result = $archiveService->moveDocument((object)$data, $record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Document could not be moved')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Document Moved')
                    ->body("Document {$record->name} moved to new folder")
                    ->success()
                    ->send();
            });
    }
}
