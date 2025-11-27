{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div class="container w-full md:w-1/2 mx-auto p-6">
        <div class="card">
            <h1 class="text-2xl font-bold text-center">{{ __("install.welcome_message") }}</h1>

            <p class="text-center">{{ __("install.requirements_message") }}</p>

            <div class="mt-6">
                {{-- TODO: Convert SelectInput to Filament equivalent --}}

                {{-- TODO: Start LoadingScreen Filament equivalent --}}
                    <ul>
                        <li>
                            <span class="text-green-500">&#10003;</span>
                            <span class="text-red-500">&#10005;</span>
                            {{ $t(`install.requirements.${requirement.name}`) }}
                        </li>
                    </ul>
                {{-- TODO: End LoadingScreen --}}
            </div>

            <div class="mt-6">
                <p class="text-green-500">{{ __("install.all_requirements_met") }}</p>
                <p class="text-red-500">{{ __("install.not_all_requirements_met") }}</p>
            </div>

            <div class="flex justify-end mt-6">
                {{-- TODO: Convert Button to Filament equivalent --}}
            </div>
        </div>
    </div>