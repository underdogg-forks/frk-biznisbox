{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div class="flex flex-col gap-2 mb-2">
        <label class="dark:text-surface-200">{{ label }}</label>
        <DatePicker
            :model-value="modelValue"
            :min-date="minDate"
            :max-date="maxDate"
            :show-time="showTime"
            :hour-format="hourFormat"
            :date-format="dateFormat"
            @date-select="updateValue"
            inputClass="w-full"
        />
        <div class="flex flex-column">
            <div class="dark:text-red-400 text-red-500 text-sm">
                {{ error?.$message }}
            </div>
        </div>
    </div>