<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Filament\Actions\Concerns\SendsDocumentNotifications;
use App\Services\QuoteService;
use Filament\Actions\Action;

class SendQuoteNotificationAction
{
    use HandlesNotifications;
    use SendsDocumentNotifications;

    public static function make(): Action
    {
        return static::makeNotificationAction(
            serviceClass: QuoteService::class,
            method: 'sendQuoteNotification',
            documentType: 'quote'
        );
    }
}
