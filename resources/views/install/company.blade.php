@extends('filament::layouts.app')
@endsection
</x-filament::page>
</div>
</div>
</form>
</div>
<x-filament::button type="submit" icon="heroicon-o-arrow-right">{{ __('basic.next') }}</x-filament::button>
<div class="flex justify-end mt-6">
    <x-filament::input name="company_email" label="{{ __('admin.company.company_email') }}" />
    <x-filament::input name="company_phone" label="{{ __('admin.company.company_phone') }}" />
    <x-filament::select name="company_country" label="{{ __('admin.company.company_country') }}"
                        :options="$countries" />
    <x-filament::input name="company_city" label="{{ __('admin.company.company_city') }}" />
    <x-filament::input name="company_zip" label="{{ __('admin.company.company_zip') }}" />
    <x-filament::input name="company_address" label="{{ __('admin.company.company_address') }}" />
    <x-filament::input name="company_name" label="{{ __('admin.company.company_name') }}" />
    @csrf
    <form method="POST" action="{{ route('install.setSettingsInDb') }}">
        <p class="text-center">{{ __('install.company_welcome_description') }}</p>
        <h1 class="text-2xl font-bold text-center">{{ __('install.company_welcome') }}</h1>
        <div class="card">
            <div class="container w-full md:w-1/2 mx-auto p-6">
                <x-filament::page>
@section('content')


