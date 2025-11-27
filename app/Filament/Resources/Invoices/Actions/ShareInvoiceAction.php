<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Models\Invoice;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class ShareInvoiceAction
{
    public static function make(): Action
    {
        return Action::make('share')
            ->label('Share Invoice')
            ->icon('heroicon-o-share')
            ->action(function (Invoice $record) {
                // TODO: Implement actual share functionality from InvoiceController@shareInvoice
                // This is a placeholder action
                
                $shareUrl = route('clientGetInvoice') . '?key=' . $record->share_key;
                
                Notification::make()
                    ->title('Invoice Share Link Generated')
                    ->body("Share this link: {$shareUrl}")
                    ->success()
                    ->send();
                
                return $shareUrl;
            });
    }
}
