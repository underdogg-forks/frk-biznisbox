<?php

namespace App\Filament\Resources\SupportTickets\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SupportTicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('assignee_id')
                    ->default(null),
                TextInput::make('partner_id')
                    ->default(null),
                TextInput::make('contact_id')
                    ->default(null),
                TextInput::make('category_id')
                    ->default(null),
                TextInput::make('department_id')
                    ->default(null),
                TextInput::make('number')
                    ->default(null),
                TextInput::make('subject')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('open'),
                TextInput::make('priority')
                    ->required()
                    ->default('low'),
                TextInput::make('type')
                    ->required()
                    ->default('ticket'),
                Toggle::make('is_internal')
                    ->required(),
                TextInput::make('source')
                    ->required()
                    ->default('email'),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('tags')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('channel')
                    ->default(null),
                Toggle::make('custom_contact')
                    ->required(),
                TextInput::make('contact_name')
                    ->default(null),
                TextInput::make('contact_email')
                    ->email()
                    ->default(null),
                TextInput::make('contact_phone_number')
                    ->tel()
                    ->default(null),
            ]);
    }
}
