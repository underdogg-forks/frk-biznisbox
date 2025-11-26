<?php

namespace App\Filament\Resources\Admin\WebhookSubscriptions\Pages;

use App\Filament\Resources\Admin\WebhookSubscriptions\WebhookSubscriptionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWebhookSubscription extends EditRecord
{
    protected static string $resource = WebhookSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
