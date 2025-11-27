<?php

namespace App\Filament\Resources\Bills\Actions;

use App\Filament\Actions\Concerns\GeneratesDocumentPdf;
use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Services\BillService;
use Filament\Actions\Action;

class GenerateBillPdfAction
{
    use GeneratesDocumentPdf;
    use HandlesNotifications;

    public static function make(): Action
    {
        return static::makePdfAction(
            serviceClass: BillService::class,
            method: 'getBillPdf',
            label: 'Generate PDF',
            documentType: 'bill'
        );
    }
}
