<?php

namespace App\Filament\Resources\CalendarEvents\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CalendarEventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->default(null),
                TextInput::make('title')
                    ->required(),
                TextInput::make('icon')
                    ->default(null),
                TextInput::make('type')
                    ->required()
                    ->default('event'),
                TextInput::make('color')
                    ->default('#000000'),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('start'),
                DateTimePicker::make('end'),
                TextInput::make('timezone')
                    ->required()
                    ->default('UTC'),
                Toggle::make('all_day')
                    ->required(),
                Textarea::make('rrule')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('reminder')
                    ->default(null),
                TextInput::make('show_as')
                    ->default('busy'),
                TextInput::make('status')
                    ->default('confirmed'),
                TextInput::make('privacy')
                    ->default('public'),
            ]);
    }
}
