<?php
namespace App\Filament\Resources;

use App\Models\Payment;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Resources\Form;
use Filament\Tables;
use Filament\Forms;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Payments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')->required(),
                Forms\Components\TextInput::make('method')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('method'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}

