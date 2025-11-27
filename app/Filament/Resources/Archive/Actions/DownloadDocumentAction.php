<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
use App\Services\ArchiveService;
use Filament\Actions\Action;

class DownloadDocumentAction
{
    public static function make(): Action
    {
        return Action::make('download')
            ->label('Download')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(function (Archive $record) {
                $archiveService = app(ArchiveService::class);
                
                return $archiveService->downloadDocument($record->id);
            });
    }
}
