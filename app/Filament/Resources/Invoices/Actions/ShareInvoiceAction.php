<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Filament\Actions\Concerns\SharesDocuments;
use App\Services\InvoiceService;
use Filament\Actions\Action;

class ShareInvoiceAction
{
    use HandlesNotifications;
    use SharesDocuments;

    public static function make(): Action
    {
        return static::makeShareAction(
            serviceClass: InvoiceService::class,
            method: 'shareInvoice',
            label: 'Share Invoice',
            route: 'clientGetInvoice',
            documentType: 'invoice'
        );
    }
}
