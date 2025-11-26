<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('department_id')
                    ->default(null),
                TextInput::make('user_id')
                    ->default(null),
                TextInput::make('number')
                    ->default(null),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone_number')
                    ->tel()
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('address')
                    ->default(null),
                TextInput::make('city')
                    ->default(null),
                TextInput::make('zip_code')
                    ->default(null),
                TextInput::make('country')
                    ->default(null),
                TextInput::make('position')
                    ->default(null),
                TextInput::make('status')
                    ->default(null),
                TextInput::make('type')
                    ->default(null),
                TextInput::make('salary')
                    ->default(null),
                TextInput::make('hourly_rate')
                    ->default(null),
                TextInput::make('level')
                    ->default(null),
                TextInput::make('contract_type')
                    ->default(null),
                TextInput::make('contract_start_date')
                    ->default(null),
                TextInput::make('contract_end_date')
                    ->default(null),
            ]);
    }
}
