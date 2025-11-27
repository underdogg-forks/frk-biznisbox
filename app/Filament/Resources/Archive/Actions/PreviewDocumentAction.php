<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
use App\Services\ArchiveService;
use Filament\Actions\Action;

class PreviewDocumentAction
{
    public static function make(): Action
    {
        return Action::make('preview')
            ->label('Preview')
            ->icon('heroicon-o-eye')
            ->action(function (Archive $record) {
                $archiveService = app(ArchiveService::class);
                
                return $archiveService->previewDocument($record->id);
            });
    }
}
