<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Filament\Actions\Concerns\GeneratesDocumentPdf;
use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Services\InvoiceService;
use Filament\Actions\Action;

class GenerateInvoicePdfAction
{
    use GeneratesDocumentPdf;
    use HandlesNotifications;

    public static function make(): Action
    {
        return static::makePdfAction(
            serviceClass: InvoiceService::class,
            method: 'getInvoicePdf',
            label: 'Generate PDF',
            documentType: 'invoice'
        );
    }
}
