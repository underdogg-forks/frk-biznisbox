<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('invoice_id')
                    ->default(null),
                TextInput::make('bill_id')
                    ->default(null),
                TextInput::make('customer_id')
                    ->default(null),
                TextInput::make('supplier_id')
                    ->default(null),
                TextInput::make('account_id')
                    ->default(null),
                TextInput::make('category_id')
                    ->default(null),
                TextInput::make('payment_id')
                    ->default(null),
                TextInput::make('bank_transaction_id')
                    ->default(null),
                TextInput::make('number')
                    ->default(null),
                TextInput::make('type')
                    ->default('expense'),
                TextInput::make('from_account')
                    ->default(null),
                TextInput::make('to_account')
                    ->default(null),
                TextInput::make('name')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('currency')
                    ->default(null),
                TextInput::make('exchange_rate')
                    ->numeric()
                    ->default(null),
                TextInput::make('payment_method')
                    ->default(null),
                TextInput::make('reference')
                    ->default(null),
                TextInput::make('status')
                    ->default(null),
                DateTimePicker::make('date'),
                Toggle::make('reconciled')
                    ->required(),
                DateTimePicker::make('reconciled_at'),
            ]);
    }
}
