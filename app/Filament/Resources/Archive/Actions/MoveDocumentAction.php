<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
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
                // TODO: Implement actual move from ArchiveController@moveDocument
                // This is a placeholder action
                
                Notification::make()
                    ->title('Document Moved')
                    ->body("Document {$record->name} moved to new folder")
                    ->success()
                    ->send();
            });
    }
}
