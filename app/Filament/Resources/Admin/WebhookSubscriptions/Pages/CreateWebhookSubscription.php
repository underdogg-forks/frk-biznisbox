<?php

namespace App\Filament\Resources\Admin\WebhookSubscriptions\Pages;

use App\Filament\Resources\Admin\WebhookSubscriptions\WebhookSubscriptionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWebhookSubscription extends CreateRecord
{
    protected static string $resource = WebhookSubscriptionResource::class;
}
