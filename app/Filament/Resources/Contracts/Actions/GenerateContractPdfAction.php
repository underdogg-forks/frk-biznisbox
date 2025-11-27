<?php

namespace App\Filament\Resources\Contracts\Actions;

use App\Models\Contract;
use App\Services\ContractService;
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
                $contractService = app(ContractService::class);
                
                try {
                    return response()->streamDownload(function () use ($contractService, $record) {
                        echo $contractService->getContractPdf($record->id, 'attach');
                    }, 'Contract ' . $record->number . '.pdf');
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
