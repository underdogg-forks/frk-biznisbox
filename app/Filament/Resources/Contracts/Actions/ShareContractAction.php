<?php

namespace App\Filament\Resources\Contracts\Actions;

use App\Models\Contract;
use App\Services\ContractService;
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
                $contractService = app(ContractService::class);
                $result = $contractService->shareContract($record->id, []);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Contract could not be shared')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                $shareUrl = route('clientGetContract') . '?key=' . $result['share_key'];
                
                Notification::make()
                    ->title('Contract Share Link Generated')
                    ->body("Share this link: {$shareUrl}")
                    ->success()
                    ->send();
                
                return $shareUrl;
            });
    }
}
