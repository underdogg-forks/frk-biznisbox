@extends('filament::layouts.app')

@section('content')
    <x-filament::page>
        <div class="container w-full md:w-1/2 mx-auto p-6">
            <div class="card">
                <h1 class="text-2xl font-bold text-center">{{ __('install.creating_tables') }}</h1>
                <p class="text-center">{{ __('install.creating_tables_description') }}</p>
                <div class="flex justify-between">
                    <x-filament::spinner />
                </div>
                @if(session('error'))
                    <div class="mt-6">
                        <p class="text-red-500 font-bold">{{ session('error') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </x-filament::page>
@endsection

