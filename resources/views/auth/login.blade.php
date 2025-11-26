// ...existing code...
@extends('filament::layouts.auth')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="p-2 shadow-md border border-gray-300 rounded-md w-full md:w-96 mx-4">
            @if (settings('company_logo'))
                <img src="{{ url('storage/' . settings('company_logo')) }}" class="w-32 h-32 mx-auto" alt="logo" />
            @endif
            <h1 class="text-center text-2xl font-bold mb-4 text-gray-800">
                {{ __('auth.login') }}
            </h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <x-filament::input name="email" type="email" label="{{ __('auth.email') }}" autocomplete="username"
                                   required />
                <x-filament::input name="password" type="password" label="{{ __('auth.password') }}" required />
                @if(session('otp_required'))
                    <x-filament::input name="otp" label="{{ __('auth.otp') }}" />
                @endif
                <x-filament::button type="submit" class="mt-4 w-full">
                    {{ __('auth.login') }}
                </x-filament::button>
            </form>
        </div>
    </div>
@endsection
// ...existing code...
