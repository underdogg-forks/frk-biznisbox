<?php
namespace App\Filament\Resources\Admin;

use App\Models\Currency;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Resources\Form;
use Filament\Tables;
use Filament\Forms;

class CurrencyResource extends Resource
{
    protected static ?string $model = Currency::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Admin';
    protected static ?string $panel = 'admin';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('code')->required(),
                Forms\Components\TextInput::make('rate')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('rate'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
