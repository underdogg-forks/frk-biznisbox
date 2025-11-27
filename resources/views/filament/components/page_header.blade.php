{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div id="header" class="mb-3">
        <div class="flex place-items-center">
            <div class="flex font-semibold text-xl">
                <h3>{{ title }}</h3>
            </div>
            <div class="grow"></div>
            <div class="ml-2 flex gap-2 flex-wrap">
                <slot name="actions"></slot>
            </div>
        </div>
    </div>