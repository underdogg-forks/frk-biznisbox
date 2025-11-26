<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('assignee_id')
                    ->default(null),
                TextInput::make('number')
                    ->default(null),
                TextInput::make('type')
                    ->default(null),
                TextInput::make('entity_type')
                    ->default(null),
                TextInput::make('name')
                    ->required(),
                TextInput::make('vat_number')
                    ->default(null),
                TextInput::make('language')
                    ->default(null),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('website')
                    ->url()
                    ->default(null),
                TextInput::make('size')
                    ->default(null),
                TextInput::make('industry')
                    ->default(null),
                TextInput::make('currency')
                    ->default(null),
                TextInput::make('status')
                    ->default(null),
            ]);
    }
}
