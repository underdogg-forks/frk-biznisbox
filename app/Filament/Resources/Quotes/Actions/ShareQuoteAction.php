<?php

namespace App\Filament\Resources\Quotes\Actions;

use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Filament\Actions\Concerns\SharesDocuments;
use App\Services\QuoteService;
use Filament\Actions\Action;

class ShareQuoteAction
{
    use HandlesNotifications;
    use SharesDocuments;

    public static function make(): Action
    {
        return static::makeShareAction(
            serviceClass: QuoteService::class,
            method: 'shareQuote',
            label: 'Share Quote',
            route: 'clientGetQuote',
            documentType: 'quote'
        );
    }
}
