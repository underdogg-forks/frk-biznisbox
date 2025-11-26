<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('category_id')
                    ->default(null),
                TextInput::make('number')
                    ->default(null),
                TextInput::make('name')
                    ->required(),
                TextInput::make('type')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('sell_price')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
                TextInput::make('buy_price')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
                TextInput::make('stock')
                    ->numeric()
                    ->default(null),
                TextInput::make('stock_min')
                    ->numeric()
                    ->default(null),
                TextInput::make('stock_max')
                    ->numeric()
                    ->default(null),
                TextInput::make('unit')
                    ->default(null),
                TextInput::make('tax')
                    ->default(null),
                Toggle::make('active')
                    ->required(),
                TextInput::make('barcode')
                    ->default(null),
                TextInput::make('additional_info')
                    ->default(null),
            ]);
    }
}
