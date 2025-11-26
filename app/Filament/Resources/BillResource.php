<?php
namespace App\Filament\Resources;

use App\Models\Bill;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Resources\Form;
use Filament\Tables;
use Filament\Forms;

class BillResource extends Resource
{
    protected static ?string $model = Bill::class;
    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';
    protected static ?string $navigationGroup = 'Bills';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')->required(),
                Forms\Components\TextInput::make('status')->required(),
                Forms\Components\TextInput::make('currency')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('currency'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}

