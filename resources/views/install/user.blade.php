@extends('filament::layouts.app')

@section('content')
    <x-filament::page>
        <div class="container w-full md:w-1/2 mx-auto p-6">
            <div class="card">
                <h1 class="text-2xl font-bold text-center">{{ __('install.create_user') }}</h1>
                <p class="text-center">{{ __('install.create_user_description') }}</p>
                <form method="POST" action="{{ route('install.createAdminUser') }}">
                    @csrf
                    <x-filament::input name="first_name" label="{{ __('form.first_name') }}" />
                    <x-filament::input name="last_name" label="{{ __('form.last_name') }}" />
                    <x-filament::input name="email" label="{{ __('form.email') }}" />
                    <x-filament::input name="password" type="password" label="{{ __('form.password') }}" />
                    <div class="flex justify-end mt-6">
                        <x-filament::button type="submit"
                                            icon="heroicon-o-arrow-right">{{ __('basic.next') }}</x-filament::button>
                    </div>
                </form>
            </div>
        </div>
    </x-filament::page>
@endsection

