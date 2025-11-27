{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div class="container w-full md:w-1/2 mx-auto p-6">
        <div class="card">
            <h1 class="text-2xl font-bold text-center">{{ __("install.creating_tables") }}</h1>

            <p class="text-center">{{ __("install.creating_tables_description") }}</p>

            <div class="flex justify-between">
                <ProgressSpinner />
            </div>

            <div class="mt-6 text-center">
                <p class="text-red-500 font-bold">{{ error }}</p>
            </div>
        </div>
    </div>