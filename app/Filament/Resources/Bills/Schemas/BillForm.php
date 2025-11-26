<?php

namespace App\Filament\Resources\Bills\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->default(null),
                TextInput::make('supplier_id')
                    ->default(null),
                TextInput::make('supplier_name')
                    ->default(null),
                TextInput::make('supplier_address_id')
                    ->default(null),
                TextInput::make('supplier_address')
                    ->default(null),
                TextInput::make('supplier_city')
                    ->default(null),
                TextInput::make('supplier_zip_code')
                    ->default(null),
                TextInput::make('supplier_country')
                    ->default(null),
                TextInput::make('currency')
                    ->default(null),
                TextInput::make('currency_rate')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('reference')
                    ->default(null),
                TextInput::make('payment_method')
                    ->default(null),
                TextInput::make('status')
                    ->default('draft'),
                DatePicker::make('date'),
                DatePicker::make('due_date'),
                TextInput::make('notes')
                    ->default(null),
                TextInput::make('footer')
                    ->default(null),
                TextInput::make('discount')
                    ->numeric()
                    ->default(null),
                TextInput::make('discount_type')
                    ->default(null),
                TextInput::make('tax')
                    ->numeric()
                    ->default(null),
                TextInput::make('total')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
