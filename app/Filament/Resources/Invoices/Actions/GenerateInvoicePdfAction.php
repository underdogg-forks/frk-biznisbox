<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Models\Invoice;
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
                // TODO: Implement actual PDF generation from InvoiceController@getInvoicePdf
                // This is a placeholder action
                
                $pdfUrl = route('getInvoicePdf', ['id' => $record->id]);
                
                Notification::make()
                    ->title('PDF Generated')
                    ->body('Opening PDF...')
                    ->success()
                    ->send();
                
                // In actual implementation, this would generate and download the PDF
                return redirect($pdfUrl);
            });
    }
}
