<?php

namespace App\Filament\Resources\OnlinePayments;

use App\Filament\Resources\OnlinePayments\Pages\CreateOnlinePayment;
use App\Filament\Resources\OnlinePayments\Pages\EditOnlinePayment;
use App\Filament\Resources\OnlinePayments\Pages\ListOnlinePayments;
use App\Filament\Resources\OnlinePayments\Schemas\OnlinePaymentForm;
use App\Filament\Resources\OnlinePayments\Tables\OnlinePaymentsTable;
use App\Models\OnlinePayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OnlinePaymentResource extends Resource
{
    protected static ?string $model = OnlinePayment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OnlinePaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnlinePaymentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOnlinePayments::route('/'),
            'create' => CreateOnlinePayment::route('/create'),
            'edit' => EditOnlinePayment::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
