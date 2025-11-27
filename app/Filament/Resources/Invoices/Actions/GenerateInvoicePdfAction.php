<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Models\Invoice;
use App\Services\InvoiceService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class GenerateInvoicePdfAction
{
    public static function make(): Action
    {
        return Action::make('generatePdf')
            ->label('Generate PDF')
            ->icon('heroicon-o-document-arrow-down')
            ->action(function (Invoice $record) {
                $invoiceService = app(InvoiceService::class);
                
                try {
                    return response()->streamDownload(function () use ($invoiceService, $record) {
                        echo $invoiceService->getInvoicePdf($record->id, 'attach');
                    }, 'Invoice ' . $record->number . '.pdf');
                } catch (\Exception $e) {
                    Notification::make()
                        ->title('Error')
                        ->body('PDF could not be generated: ' . $e->getMessage())
                        ->danger()
                        ->send();
                }
            });
    }
}
