<?php

namespace App\Filament\Resources\Contracts\Actions;

use App\Filament\Actions\Concerns\HandlesNotifications;
use App\Filament\Actions\Concerns\SharesDocuments;
use App\Services\ContractService;
use Filament\Actions\Action;

class ShareContractAction
{
    use HandlesNotifications;
    use SharesDocuments;

    public static function make(): Action
    {
        return static::makeShareAction(
            serviceClass: ContractService::class,
            method: 'shareContract',
            label: 'Share Contract',
            route: 'clientGetContract',
            documentType: 'contract',
            getData: fn () => [[]]
        );
    }
}
