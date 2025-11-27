<?php

namespace App\Filament\Resources\Archive\Actions;

use App\Models\Archive;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class PreviewDocumentAction
{
    public static function make(): Action
    {
        return Action::make('preview')
            ->label('Preview')
            ->icon('heroicon-o-eye')
            ->action(function (Archive $record) {
                // TODO: Implement actual preview from ArchiveController@previewDocument
                // This is a placeholder action
                
                $previewUrl = route('previewDocument', ['id' => $record->id]);
                
                Notification::make()
                    ->title('Opening Preview')
                    ->body("Opening preview for {$record->name}")
                    ->success()
                    ->send();
                
                // In actual implementation, this would open preview in modal or new tab
                return redirect($previewUrl);
            });
    }
}
