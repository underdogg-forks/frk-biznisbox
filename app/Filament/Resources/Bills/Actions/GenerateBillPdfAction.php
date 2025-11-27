<?php

namespace App\Filament\Resources\Bills\Actions;

use App\Models\Bill;
use App\Services\BillService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class GenerateBillPdfAction
{
    public static function make(): Action
    {
        return Action::make('generatePdf')
            ->label('Generate PDF')
            ->icon('heroicon-o-document-arrow-down')
            ->action(function (Bill $record) {
                $billService = app(BillService::class);
                
                try {
                    return response()->streamDownload(function () use ($billService, $record) {
                        echo $billService->getBillPdf($record->id, 'attach');
                    }, 'Bill ' . $record->number . '.pdf');
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
