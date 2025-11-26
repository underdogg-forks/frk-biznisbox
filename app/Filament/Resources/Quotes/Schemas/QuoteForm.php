<?php

namespace App\Filament\Resources\Quotes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class QuoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('customer_id')
                    ->default(null),
                TextInput::make('payer_id')
                    ->default(null),
                TextInput::make('sales_person_id')
                    ->default(null),
                TextInput::make('type')
                    ->default(null),
                TextInput::make('number')
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
                TextInput::make('currency')
                    ->default(null),
                TextInput::make('default_currency')
                    ->default(null),
                TextInput::make('currency_rate')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('payment_method')
                    ->default(null),
                TextInput::make('customer_name')
                    ->default(null),
                TextInput::make('customer_address_id')
                    ->default(null),
                TextInput::make('customer_address')
                    ->default(null),
                TextInput::make('customer_city')
                    ->default(null),
                TextInput::make('customer_zip_code')
                    ->default(null),
                TextInput::make('customer_country')
                    ->default(null),
                TextInput::make('payer_name')
                    ->default(null),
                TextInput::make('payer_address_id')
                    ->default(null),
                TextInput::make('payer_address')
                    ->default(null),
                TextInput::make('payer_city')
                    ->default(null),
                TextInput::make('payer_zip_code')
                    ->default(null),
                TextInput::make('payer_country')
                    ->default(null),
                DatePicker::make('date'),
                DatePicker::make('valid_until'),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('footer')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('discount_type')
                    ->default(null),
                TextInput::make('discount')
                    ->numeric()
                    ->default(0.0),
                TextInput::make('tax')
                    ->numeric()
                    ->default(0.0),
                TextInput::make('total')
                    ->numeric()
                    ->default(0.0),
            ]);
    }
}
