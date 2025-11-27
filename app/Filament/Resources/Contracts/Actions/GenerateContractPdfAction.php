<?php

namespace App\Filament\Resources\Contracts\Actions;

use App\Models\Contract;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class GenerateContractPdfAction
{
    public static function make(): Action
    {
        return Action::make('generatePdf')
            ->label('Generate PDF')
            ->icon('heroicon-o-document-arrow-down')
            ->action(function (Contract $record) {
                // TODO: Implement actual PDF generation from ContractController@getContractPdf
                // This is a placeholder action
                
                $pdfUrl = route('getContractPdf', ['id' => $record->id]);
                
                Notification::make()
                    ->title('PDF Generated')
                    ->body('Opening contract PDF...')
                    ->success()
                    ->send();
                
                // In actual implementation, this would generate and download the PDF
                return redirect($pdfUrl);
            });
    }
}
