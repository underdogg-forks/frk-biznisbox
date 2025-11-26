<?php

namespace App\Filament\Resources\Admin\Taxes;

use App\Filament\Resources\Admin\Taxes\Pages\CreateTax;
use App\Filament\Resources\Admin\Taxes\Pages\EditTax;
use App\Filament\Resources\Admin\Taxes\Pages\ListTaxes;
use App\Filament\Resources\Admin\Taxes\Schemas\TaxForm;
use App\Filament\Resources\Admin\Taxes\Tables\TaxesTable;
use App\Models\Tax;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TaxResource extends Resource
{
    protected static ?string $model = Tax::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TaxForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TaxesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListTaxes::route('/'),
            'create' => CreateTax::route('/create'),
            'edit'   => EditTax::route('/{record}/edit'),
        ];
    }
}
