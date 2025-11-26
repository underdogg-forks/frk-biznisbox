@extends('filament::layouts.app')

@section('content')
    <x-filament::page>
        <x-filament::header :title="__('quote.quote')">
            <x-slot name="actions">
                <x-filament::button :label="__('quote.new_quote')" icon="heroicon-o-plus"
                                    url="{{ route('quotes.create') }}" />
            </x-slot>
        </x-filament::header>
        <x-filament::table :records="$quotes">
            <x-filament::table.column name="number" label="{{ __('form.number') }}" />
            <x-filament::table.column name="date" label="{{ __('quote.date_and_due_date') }}">
                <x-slot
                    name="body">{{ \Carbon\Carbon::parse($record->date)->format(config('app.date_format', 'Y-m-d')) }}
                    <br />{{ \Carbon\Carbon::parse($record->valid_until)->format(config('app.date_format', 'Y-m-d')) }}
                </x-slot>
            </x-filament::table.column>
            <x-filament::table.column name="customer" label="{{ __('quote.customer_and_payer') }}">
                <x-slot name="body">{{ $record->customer }}<br />{{ $record->payer }}</x-slot>
            </x-filament::table.column>
            <x-filament::table.column name="status" label="{{ __('quote.status') }}">
                <x-slot name="body">{{ __('quote.statuses.' . $record->status) }}</x-slot>
            </x-filament::table.column>
            <x-filament::table.column name="actions" label="">
                <x-slot name="body">
                    <x-filament::button :label="__('quote.view')" url="{{ route('quotes.show', $record->id) }}" />
                    <x-filament::button :label="__('quote.edit')" url="{{ route('quotes.edit', $record->id) }}" />
                </x-slot>
            </x-filament::table.column>
        </x-filament::table>
    </x-filament::page>
@endsection
