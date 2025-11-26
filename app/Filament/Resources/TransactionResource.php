<?php
namespace App\Filament\Resources;

use App\Models\Transaction;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Resources\Form;
use Filament\Tables;
use Filament\Forms;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;
    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';
    protected static ?string $navigationGroup = 'Transactions';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')->required(),
                Forms\Components\TextInput::make('amount')->required(),
                Forms\Components\TextInput::make('type')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
