<?php

namespace App\Filament\Resources\Invoices\Actions;

use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Filament\Actions\Concerns\SendsDocumentNotifications;
use App\Services\InvoiceService;
use Filament\Actions\Action;

class SendInvoiceNotificationAction
{
    use HandlesNotifications;
    use SendsDocumentNotifications;

    public static function make(): Action
    {
        return static::makeNotificationAction(
            serviceClass: InvoiceService::class,
            method: 'sendInvoiceNotification',
            documentType: 'invoice'
        );
    }
}
