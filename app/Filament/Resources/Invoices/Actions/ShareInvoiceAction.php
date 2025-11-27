<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Models\Invoice;
use App\Services\InvoiceService;
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
                $invoiceService = app(InvoiceService::class);
                $result = $invoiceService->shareInvoice($record->id);
                
                if (!$result) {
                    Notification::make()
                        ->title('Error')
                        ->body('Invoice could not be shared')
                        ->danger()
                        ->send();
                    
                    return;
                }
                
                $shareUrl = route('clientGetInvoice') . '?key=' . $result['share_key'];
                
                Notification::make()
                    ->title('Invoice Share Link Generated')
                    ->body("Share this link: {$shareUrl}")
                    ->success()
                    ->send();
                
                return $shareUrl;
            });
    }
}
