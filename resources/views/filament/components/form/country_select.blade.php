{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div class="flex flex-col gap-2">
        <label class="dark:text-surface-200">{{ label }}</label>
        {{-- TODO: Start component Filament equivalent --}}
            {{-- TODO: Convert slot to Blade section --}}
                <div>
                    {{ $t(`countries.${slotProps.value}`) }}
                </div>
                <span>
                    {{ slotProps.placeholder }}
                </span>