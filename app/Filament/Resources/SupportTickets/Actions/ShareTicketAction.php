<?php

namespace App\Filament\Resources\SupportTickets\Actions;

use App\Models\SupportTicket;
use App\Services\SupportTicketService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ShareTicketAction
{
    public static function make(): Action
    {
        return Action::make('share')
            ->label('Share Ticket')
            ->icon('heroicon-o-share')
            ->action(function (SupportTicket $record) {
                $supportTicketService = app(SupportTicketService::class);
                $result = $supportTicketService->shareTicket($record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Ticket could not be shared')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                $shareUrl = route('clientGetTicket') . '?key=' . $result['share_key'];
                
                Notification::make()
                    ->title('Ticket Share Link Generated')
                    ->body("Share this link: {$shareUrl}")
                    ->success()
                    ->send();
                
                return $shareUrl;
            });
    }
}
