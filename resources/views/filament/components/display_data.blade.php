{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div class="mb-2">
        <!-- Display the input inline with the value -->
        <div class="inline-flex items-center">
            <span class="font-bold mr-2">{{ input }}</span>
            <span>{{ value }}</span>
        </div>
        <!-- Display the input inline with a custom value -->
        <div class="inline-flex items-center">
            <span class="font-bold mr-2">{{ input }}</span>
            <slot></slot>
        </div>

        <!-- Display the input and value in a block format -->
        <div>
            <div class="font-bold mb-1">
                {{ input }}
            </div>
            <div>
                <slot></slot>
            </div>
            <div>
                <a target="_blank" class="text-blue-500 break-word">
                    {{ value }}
                </a>
            </div>
            <div class="break-word">
                {{ value }}
            </div>
        </div>
    </div>