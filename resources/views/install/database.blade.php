@extends('filament::layouts.app')

@section('content')
    <x-filament::page>
        <div class="container w-full md:w-1/2 mx-auto p-6">
            <div class="card">
                <h1 class="text-2xl font-bold text-center">{{ __('install.database_configuration') }}</h1>
                <p class="text-center">{{ __('install.database_configuration_description') }}</p>
                <form method="POST" action="{{ route('install.checkDbConnection') }}">
                    @csrf
                    <x-filament::select name="driver" label="{{ __('install.database_driver') }}" :options="$drivers" />
                    <x-filament::input name="host" label="{{ __('install.database_host') }}" />
                    <x-filament::input name="port" label="{{ __('install.database_port') }}" />
                    <x-filament::input name="database" label="{{ __('install.database_name') }}" />
                    <x-filament::input name="username" label="{{ __('install.database_username') }}" />
                    <x-filament::input name="password" type="password" label="{{ __('install.database_password') }}" />
                    <x-filament::input name="path" label="{{ __('install.database_path') }}" />
                    <div class="mb-6">
                        @if(session('checked'))
                            <p class="text-green-500 font-bold">{{ __('install.connection_successful') }}</p>
                        @endif
                        @if(session('error'))
                            <p class="text-red-500 font-bold">{{ session('error') }}</p>
                        @endif
                    </div>
                    <div class="flex justify-between gap-4 mt-6">
                        <x-filament::button type="button" onclick="window.history.back()"
                                            icon="heroicon-o-arrow-left">{{ __('basic.back') }}</x-filament::button>
                        <x-filament::button type="submit" icon="heroicon-o-check"
                                            class="bg-green-500">{{ __('install.check_connection') }}</x-filament::button>
                        <x-filament::button type="submit" formaction="{{ route('install.updateEnvFileWithDbInfo') }}"
                                            icon="heroicon-o-arrow-right">{{ __('basic.next') }}</x-filament::button>
                    </div>
                </form>
            </div>
        </div>
    </x-filament::page>
@endsection

