<?php

namespace App\Filament\Resources\OpenBankings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OpenBankingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                TextColumn::make('bank_id')
                    ->searchable(),
                TextColumn::make('iban')
                    ->searchable(),
                TextColumn::make('bank_name')
                    ->searchable(),
                TextColumn::make('bank_logo')
                    ->searchable(),
                TextColumn::make('account_id')
                    ->searchable(),
                TextColumn::make('agreement_id')
                    ->searchable(),
                TextColumn::make('agreement_status')
                    ->searchable(),
                TextColumn::make('requisition_id')
                    ->searchable(),
                TextColumn::make('requisition_status')
                    ->searchable(),
                TextColumn::make('transaction_total_days')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('connection_status')
                    ->searchable(),
                TextColumn::make('connection_valid_until')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('last_transaction_sync')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
