<?php

namespace App\Filament\Resources\OpenBankings;

use App\Filament\Resources\OpenBankings\Pages\CreateOpenBanking;
use App\Filament\Resources\OpenBankings\Pages\EditOpenBanking;
use App\Filament\Resources\OpenBankings\Pages\ListOpenBankings;
use App\Filament\Resources\OpenBankings\Schemas\OpenBankingForm;
use App\Filament\Resources\OpenBankings\Tables\OpenBankingsTable;
use App\Models\OpenBanking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OpenBankingResource extends Resource
{
    protected static ?string $model = OpenBanking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OpenBankingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OpenBankingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListOpenBankings::route('/'),
            'create' => CreateOpenBanking::route('/create'),
            'edit'   => EditOpenBanking::route('/{record}/edit'),
        ];
    }
}
