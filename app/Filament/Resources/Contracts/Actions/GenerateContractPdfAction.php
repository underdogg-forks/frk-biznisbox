<?php

namespace App\Filament\Resources\Contracts\Actions;

use App\Filament\Actions\Concerns\GeneratesDocumentPdf;
use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Services\ContractService;
use Filament\Actions\Action;

class GenerateContractPdfAction
{
    use GeneratesDocumentPdf;
    use HandlesNotifications;

    public static function make(): Action
    {
        return static::makePdfAction(
            serviceClass: ContractService::class,
            method: 'getContractPdf',
            label: 'Generate PDF',
            documentType: 'contract'
        );
    }
}
