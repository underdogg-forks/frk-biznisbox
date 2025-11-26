@extends('filament::layouts.app')

@section('content')
    <x-filament::page>
        <div class="container w-full md:w-1/2 mx-auto p-6">
            <div class="card">
                <h1 class="text-2xl font-bold text-center">{{ __('install.finish_installation') }}</h1>
                <p class="text-center">{{ __('install.finish_installation_description') }}</p>
                <div class="flex justify-center mt-6">
                    <a href="{{ route('login') }}">
                        <x-filament::button icon="heroicon-o-login">{{ __('install.go_to_login') }}</x-filament::button>
                    </a>
                </div>
            </div>
        </div>
    </x-filament::page>
@endsection

