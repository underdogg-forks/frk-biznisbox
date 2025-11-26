<?php

namespace App\Filament\Resources\Contracts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContractForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->default(null),
                TextInput::make('partner_id')
                    ->default(null),
                TextInput::make('partner_address_id')
                    ->default(null),
                TextInput::make('category_id')
                    ->default(null),
                TextInput::make('number')
                    ->default(null),
                TextInput::make('type')
                    ->default(null),
                TextInput::make('title')
                    ->required(),
                TextInput::make('description')
                    ->default(null),
                TextInput::make('status')
                    ->default(null),
                Textarea::make('content')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('start_date'),
                DateTimePicker::make('end_date'),
                TextInput::make('version')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('signed_date'),
                DateTimePicker::make('date_for_signature'),
                TextInput::make('notes')
                    ->default(null),
                TextInput::make('sha256')
                    ->default(null),
            ]);
    }
}
