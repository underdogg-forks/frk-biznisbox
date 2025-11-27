{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div class="flex flex-col gap-2 mb-2">
        <label class="dark:text-surface-200">{{ label }}</label>
        <InputNumber
            :model-value="modelValue"
            inputClass="w-full"
        />

        <InputNumber
            :model-value="modelValue"
            mode="decimal"
            :min-fraction-digits="minFraction"
            :max-fraction-digits="maxFraction"
            inputClass="w-full"
        />

        <InputNumber
            :model-value="modelValue"
            mode="currency"
            inputClass="w-full"
        />

        <InputNumber
            :model-value="modelValue"
            mode="decimal"
            :min-fraction-digits="0"
            :max-fraction-digits="2"
            inputClass="w-full"
        />

        <InputNumber
            :model-value="modelValue"
            show-buttons
            inputClass="w-full"
        />

        <div class="flex flex-column">
            <div class="dark:text-red-400 text-red-500 text-sm">
                {{ error?.$message }}
            </div>
        </div>
    </div>