<?php

namespace App\Filament\Resources;

use App\Models\Account;
use Filament\Resources\Resource;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-banknotes';
    protected static string|\UnitEnum|null $navigationGroup = 'Accounts';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\TextInput::make('number')->required(),
                \Filament\Forms\Components\TextInput::make('type'),
            ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name'),
                \Filament\Tables\Columns\TextColumn::make('number'),
                \Filament\Tables\Columns\TextColumn::make('type'),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ]);
    }
}
