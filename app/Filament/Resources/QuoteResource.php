<?php
namespace App\Filament\Resources;

use App\Models\Quote;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Resources\Form;
use Filament\Tables;
use Filament\Forms;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quotes';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')->required(),
                Forms\Components\Select::make('status')->options([
                    'draft' => 'Draft',
                    'sent' => 'Sent',
                    'viewed' => 'Viewed',
                    'accepted' => 'Accepted',
                    'cancelled' => 'Cancelled',
                    'rejected' => 'Rejected',
                    'converted' => 'Converted',
                    'expired' => 'Expired',
                ])->required(),
                Forms\Components\Select::make('customer_id')->relationship('customer', 'name')->required(),
                Forms\Components\Select::make('payer_id')->relationship('payer', 'name'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('customer.name'),
                Tables\Columns\TextColumn::make('payer.name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
