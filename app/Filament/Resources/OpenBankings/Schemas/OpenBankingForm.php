<?php

namespace App\Filament\Resources\OpenBankings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OpenBankingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('bank_id')
                    ->default(null),
                TextInput::make('iban')
                    ->default(null),
                TextInput::make('bank_name')
                    ->default(null),
                TextInput::make('bank_logo')
                    ->default(null),
                Textarea::make('payment_available')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('account_id')
                    ->default(null),
                TextInput::make('agreement_id')
                    ->default(null),
                TextInput::make('agreement_status')
                    ->default(null),
                TextInput::make('requisition_id')
                    ->default(null),
                TextInput::make('requisition_status')
                    ->default(null),
                TextInput::make('transaction_total_days')
                    ->numeric()
                    ->default(null),
                TextInput::make('connection_status')
                    ->default(null),
                DateTimePicker::make('connection_valid_until'),
                DateTimePicker::make('last_transaction_sync'),
            ]);
    }
}
