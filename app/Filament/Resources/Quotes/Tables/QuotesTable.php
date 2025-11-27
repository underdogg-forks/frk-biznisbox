<?php

namespace App\Filament\Resources\Quotes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class QuotesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                TextColumn::make('customer_id')
                    ->searchable(),
                TextColumn::make('payer_id')
                    ->searchable(),
                TextColumn::make('sales_person_id')
                    ->searchable(),
                TextColumn::make('type')
                    ->searchable(),
                TextColumn::make('number')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('currency')
                    ->searchable(),
                TextColumn::make('default_currency')
                    ->searchable(),
                TextColumn::make('currency_rate')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->searchable(),
                TextColumn::make('customer_name')
                    ->searchable(),
                TextColumn::make('customer_address_id')
                    ->searchable(),
                TextColumn::make('customer_address')
                    ->searchable(),
                TextColumn::make('customer_city')
                    ->searchable(),
                TextColumn::make('customer_zip_code')
                    ->searchable(),
                TextColumn::make('customer_country')
                    ->searchable(),
                TextColumn::make('payer_name')
                    ->searchable(),
                TextColumn::make('payer_address_id')
                    ->searchable(),
                TextColumn::make('payer_address')
                    ->searchable(),
                TextColumn::make('payer_city')
                    ->searchable(),
                TextColumn::make('payer_zip_code')
                    ->searchable(),
                TextColumn::make('payer_country')
                    ->searchable(),
                TextColumn::make('date')
                    ->date()
                    ->sortable(),
                TextColumn::make('valid_until')
                    ->date()
                    ->sortable(),
                TextColumn::make('discount_type')
                    ->searchable(),
                TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tax')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                \App\Filament\Resources\Quotes\Actions\ShareQuoteAction::make(),
                \App\Filament\Resources\Quotes\Actions\SendQuoteNotificationAction::make(),
                \App\Filament\Resources\Quotes\Actions\ConvertQuoteToInvoiceAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
