<?php

namespace App\Filament\Resources\Accounts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('type')
                    ->default(null),
                TextInput::make('currency')
                    ->default(null),
                TextInput::make('description')
                    ->default(null),
                TextInput::make('opening_balance')
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('date_opened'),
                DateTimePicker::make('date_closed'),
                TextInput::make('bank_name')
                    ->default(null),
                TextInput::make('bank_address')
                    ->default(null),
                TextInput::make('bank_contact')
                    ->default(null),
                TextInput::make('iban')
                    ->default(null),
                TextInput::make('bic')
                    ->default(null),
                Toggle::make('is_default'),
                Toggle::make('is_active'),
                TextInput::make('open_banking_id')
                    ->default(null),
                TextInput::make('integration')
                    ->default(null),
            ]);
    }
}
