<?php

namespace App\Filament\Resources\Admin\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->default(null),
                TextInput::make('last_name')
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('password')
                    ->password()
                    ->default(null),
                Toggle::make('active')
                    ->required(),
                TextInput::make('picture')
                    ->default(null),
                DateTimePicker::make('last_login_at'),
                TextInput::make('language')
                    ->required()
                    ->default('en'),
                TextInput::make('timezone')
                    ->required()
                    ->default('UTC'),
                TextInput::make('theme')
                    ->required()
                    ->default('light'),
                TextInput::make('oauth_user')
                    ->default(null),
                Toggle::make('two_factor_auth')
                    ->required(),
                TextInput::make('type')
                    ->default('user'),
            ]);
    }
}
