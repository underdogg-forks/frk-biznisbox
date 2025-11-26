<?php

namespace App\Filament\Resources\Admin\WebhookSubscriptions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class WebhookSubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->default(null),
                TextInput::make('name')
                    ->default(null),
                TextInput::make('url')
                    ->url()
                    ->required(),
                TextInput::make('signature_secret_key')
                    ->default(null),
                TextInput::make('http_verb')
                    ->required()
                    ->default('post'),
                Textarea::make('headers')
                    ->required()
                    ->default('[{"Content-Type": "application/json"}]')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
                Toggle::make('can_be_edited')
                    ->required(),
                Textarea::make('listen_events')
                    ->required()
                    ->default('["*"]')
                    ->columnSpanFull(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('last_called_at'),
            ]);
    }
}
