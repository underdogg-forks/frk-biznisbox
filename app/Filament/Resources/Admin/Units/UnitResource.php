<?php

namespace App\Filament\Resources\Admin\Units;

use App\Filament\Resources\Admin\Units\Pages\CreateUnit;
use App\Filament\Resources\Admin\Units\Pages\EditUnit;
use App\Filament\Resources\Admin\Units\Pages\ListUnits;
use App\Filament\Resources\Admin\Units\Schemas\UnitForm;
use App\Filament\Resources\Admin\Units\Tables\UnitsTable;
use App\Models\Unit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return UnitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnitsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListUnits::route('/'),
            'create' => CreateUnit::route('/create'),
            'edit'   => EditUnit::route('/{record}/edit'),
        ];
    }
}
