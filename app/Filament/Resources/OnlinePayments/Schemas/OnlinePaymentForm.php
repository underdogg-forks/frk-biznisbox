<?php

namespace App\Filament\Resources\OnlinePayments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OnlinePaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->default(null),
                TextInput::make('payment_method')
                    ->default(null),
                TextInput::make('payment_id')
                    ->default(null),
                TextInput::make('type')
                    ->default(null),
                TextInput::make('amount')
                    ->default(null),
                TextInput::make('currency')
                    ->default(null),
                TextInput::make('description')
                    ->default(null),
                TextInput::make('status')
                    ->default(null),
                Textarea::make('payment_response')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('payment_ref')
                    ->default(null),
                TextInput::make('payment_document_type')
                    ->default(null),
                TextInput::make('payment_document_id')
                    ->default(null),
                TextInput::make('key')
                    ->default(null),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
