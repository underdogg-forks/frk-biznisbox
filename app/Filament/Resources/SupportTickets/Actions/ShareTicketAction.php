<?php

namespace App\Filament\Resources\SupportTickets\Actions;

use App\Models\SupportTicket;
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
                // TODO: Implement actual share functionality from SupportTicketController@shareTicket
                // This is a placeholder action
                
                $shareUrl = route('clientGetTicket') . '?key=' . $record->share_key;
                
                Notification::make()
                    ->title('Ticket Share Link Generated')
                    ->body("Share this link: {$shareUrl}")
                    ->success()
                    ->send();
                
                return $shareUrl;
            });
    }
}
