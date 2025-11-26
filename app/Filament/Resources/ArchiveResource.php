<?php
}
    }
            ]);
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ->actions([
            ])
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('name'),
            ->columns([
        return $table
    {
    public static function table(Table $table): Table

    }
            ]);
                Forms\Components\TextInput::make('type'),
                Forms\Components\TextInput::make('name')->required(),
            ->schema([
        return $form
    {
    public static function form(Form $form): Form

    protected static ?string $navigationGroup = 'Archive';
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $model = Archive::class;
{
class ArchiveResource extends Resource

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\Archive;

namespace App\Filament\Resources;

