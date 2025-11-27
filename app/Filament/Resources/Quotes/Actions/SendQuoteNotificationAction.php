<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Models\PartnerContact;
use App\Models\Quote;
use App\Services\QuoteService;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;

class SendQuoteNotificationAction
{
    public static function make(): Action
    {
        return Action::make('sendNotification')
            ->label('Send Notification')
            ->icon('heroicon-o-envelope')
            ->form([
                Select::make('contact_id')
                    ->label('Recipient Contact')
                    ->options(function (Quote $record) {
                        return PartnerContact::where('partner_id', $record->customer_id)
                            ->orWhere('partner_id', $record->payer_id)
                            ->whereNotNull('email')
                            ->pluck('email', 'id');
                    })
                    ->searchable()
                    ->helperText('Leave empty to send to all primary contacts'),
            ])
            ->action(function (Quote $record, array $data) {
                $quoteService = app(QuoteService::class);
                $contact = isset($data['contact_id']) ? PartnerContact::find($data['contact_id']) : null;
                
                $result = $quoteService->sendQuoteNotification($record->id, $contact);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Quote notification could not be sent')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Quote Notification Sent')
                    ->body('Notification sent successfully')
                    ->success()
                    ->send();
            });
    }
}
