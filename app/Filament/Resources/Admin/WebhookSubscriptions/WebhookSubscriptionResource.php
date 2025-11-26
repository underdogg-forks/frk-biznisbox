<?php

namespace App\Filament\Resources\Admin\WebhookSubscriptions;

use App\Filament\Resources\Admin\WebhookSubscriptions\Pages\CreateWebhookSubscription;
use App\Filament\Resources\Admin\WebhookSubscriptions\Pages\EditWebhookSubscription;
use App\Filament\Resources\Admin\WebhookSubscriptions\Pages\ListWebhookSubscriptions;
use App\Filament\Resources\Admin\WebhookSubscriptions\Schemas\WebhookSubscriptionForm;
use App\Filament\Resources\Admin\WebhookSubscriptions\Tables\WebhookSubscriptionsTable;
use App\Models\WebhookSubscription;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WebhookSubscriptionResource extends Resource
{
    protected static ?string $model = WebhookSubscription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WebhookSubscriptionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebhookSubscriptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListWebhookSubscriptions::route('/'),
            'create' => CreateWebhookSubscription::route('/create'),
            'edit'   => EditWebhookSubscription::route('/{record}/edit'),
        ];
    }
}
