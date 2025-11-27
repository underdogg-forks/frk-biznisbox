<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Models\Invoice;
use App\Models\PartnerContact;
use App\Services\InvoiceService;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;

class SendInvoiceNotificationAction
{
    public static function make(): Action
    {
        return Action::make('sendNotification')
            ->label('Send Notification')
            ->icon('heroicon-o-envelope')
            ->form([
                Select::make('contact_id')
                    ->label('Recipient Contact')
                    ->options(function (Invoice $record) {
                        return PartnerContact::where('partner_id', $record->customer_id)
                            ->orWhere('partner_id', $record->payer_id)
                            ->whereNotNull('email')
                            ->pluck('email', 'id');
                    })
                    ->searchable()
                    ->helperText('Leave empty to send to all primary contacts'),
            ])
            ->action(function (Invoice $record, array $data) {
                $invoiceService = app(InvoiceService::class);
                $contact = isset($data['contact_id']) ? PartnerContact::find($data['contact_id']) : null;
                
                $result = $invoiceService->sendInvoiceNotification($record->id, $contact);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Invoice notification could not be sent')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                Notification::make()
                    ->title('Invoice Notification Sent')
                    ->body('Notification sent successfully')
                    ->success()
                    ->send();
            });
    }
}
