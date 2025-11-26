@extends('filament::layouts.app')

@section('content')
    <x-filament::page>
        <x-filament::header :title="__('profile.profile')" />
        <div class="card">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex mb-2">
                    @if($user->avatar_url)
                        <img src="{{ $user->avatar_url }}" class="user-avatar w-24 h-24 rounded-full" />
                        <button type="submit" formaction="{{ route('profile.deleteProfilePicture') }}"
                                class="ml-4 text-red-500">{{ __('profile.remove_avatar') }}</button>
                    @endif
                    <input type="file" name="picture" accept="image/*" class="ml-4" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-filament::input name="first_name" label="{{ __('form.first_name') }}"
                                       value="{{ old('first_name', $user->first_name) }}" />
                    <x-filament::input name="last_name" label="{{ __('form.last_name') }}"
                                       value="{{ old('last_name', $user->last_name) }}" />
                </div>
                <x-filament::button type="submit" class="mt-4">{{ __('basic.save') }}</x-filament::button>
            </form>
        </div>
    </x-filament::page>
@endsection

