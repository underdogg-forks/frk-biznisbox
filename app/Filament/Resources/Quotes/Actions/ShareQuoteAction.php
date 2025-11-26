<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Models\Quote;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ShareQuoteAction
{
    public static function make(): Action
    {
        return Action::make('share')
            ->label('Share Quote')
            ->icon('heroicon-o-share')
            ->action(function (Quote $record) {
                // TODO: Implement actual share functionality from QuoteController@shareQuote
                // This is a placeholder action
                
                $shareUrl = route('clientGetQuote') . '?key=' . $record->share_key;
                
                Notification::make()
                    ->title('Quote Share Link Generated')
                    ->body("Share this link: {$shareUrl}")
                    ->success()
                    ->send();
                
                return $shareUrl;
            });
    }
}
