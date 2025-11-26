<?php

namespace App\Filament\Resources\Admin\Currencies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CurrencyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                TextInput::make('symbol')
                    ->default(null),
                TextInput::make('exchange_rate')
                    ->default('1'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
                TextInput::make('decimal_separator')
                    ->required()
                    ->default('.'),
                TextInput::make('thousand_separator')
                    ->required()
                    ->default(','),
                TextInput::make('number_of_decimal')
                    ->required()
                    ->default('2'),
                TextInput::make('placement')
                    ->required()
                    ->default('after'),
            ]);
    }
}
