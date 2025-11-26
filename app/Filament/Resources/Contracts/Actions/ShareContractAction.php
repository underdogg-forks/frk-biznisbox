<?php

namespace App\Filament\Resources\Contracts\Actions;

use App\Models\Contract;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ShareContractAction
{
    public static function make(): Action
    {
        return Action::make('share')
            ->label('Share Contract')
            ->icon('heroicon-o-share')
            ->action(function (Contract $record) {
                // TODO: Implement actual share functionality from ContractController@shareContract
                // This is a placeholder action
                
                $shareUrl = route('clientGetContract') . '?key=' . $record->share_key;
                
                Notification::make()
                    ->title('Contract Share Link Generated')
                    ->body("Share this link: {$shareUrl}")
                    ->success()
                    ->send();
                
                return $shareUrl;
            });
    }
}
