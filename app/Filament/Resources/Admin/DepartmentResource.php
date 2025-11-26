<?php
}
    }
            ]);
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ->actions([
            ])
                Tables\Columns\TextColumn::make('name'),
            ->columns([
        return $table
    {
    public static function table(Table $table): Table

    }
            ]);
                Forms\Components\TextInput::make('name')->required(),
            ->schema([
        return $form
    {
    public static function form(Form $form): Form

    protected static ?string $panel = 'admin';
    protected static ?string $navigationGroup = 'Admin';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $model = Department::class;
{
class DepartmentResource extends Resource

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\Department;

namespace App\Filament\Resources\Admin;

