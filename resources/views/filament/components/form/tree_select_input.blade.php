{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div class="flex flex-col gap-2 mb-2">
        <label class="dark:text-surface-200">{{ label }}</label>
        <TreeSelect
            :model-value="modelValue"
            :option-value="optionValue"
            :option-label="optionLabel"
            :show-clear="showClear"
            :selection-mode="selectionMode"
        />
        <div class="flex flex-column">
            <div class="dark:text-red-400 text-red-500 text-sm">
                {{ error?.$message }}
            </div>
        </div>
    </div>