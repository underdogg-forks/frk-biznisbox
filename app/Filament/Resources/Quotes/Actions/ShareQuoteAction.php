<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Models\Quote;
use App\Services\QuoteService;
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
                $quoteService = app(QuoteService::class);
                $result = $quoteService->shareQuote($record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Quote could not be shared')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                $shareUrl = route('clientGetQuote') . '?key=' . $result['share_key'];
                
                Notification::make()
                    ->title('Quote Share Link Generated')
                    ->body("Share this link: {$shareUrl}")
                    ->success()
                    ->send();
                
                return $shareUrl;
            });
    }
}
