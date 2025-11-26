@extends('filament::layouts.app')

@section('content')
    <x-filament::page>
        <div class="container w-full md:w-1/2 mx-auto p-6">
            <div class="card">
                <h1 class="text-2xl font-bold text-center">{{ __('install.welcome_message') }}</h1>
                <p class="text-center">{{ __('install.requirements_message') }}</p>
                <form method="POST" action="{{ route('install.checkRequirements') }}">
                    @csrf
                    <x-filament::select name="language" label="{{ __('form.language') }}" :options="$locales" />
                    <ul class="mt-6">
                        @foreach($requirements as $requirement)
                            <li>
                                @if($requirement['status'])
                                    <span class="text-green-500">&#10003;</span>
                                @else
                                    <span class="text-red-500">&#10005;</span>
                                @endif
                                {{ __('install.requirements.' . $requirement['name']) }}
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-6">
                        @if($allRequirementsMet)
                            <p class="text-green-500">{{ __('install.all_requirements_met') }}</p>
                        @else
                            <p class="text-red-500">{{ __('install.not_all_requirements_met') }}</p>
                        @endif
                    </div>
                    <div class="flex justify-end mt-6">
                        <x-filament::button type="submit" icon="heroicon-o-arrow-right"
                                            :disabled="!$allRequirementsMet">{{ __('basic.next') }}</x-filament::button>
                    </div>
                </form>
            </div>
        </div>
    </x-filament::page>
@endsection

