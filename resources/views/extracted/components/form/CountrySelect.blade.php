{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="flex flex-col gap-2">
        <label :for="id" class="dark:text-surface-200">{{ label }}</label>
        <Select
            :id="id"
            :name="id"
            :model-value="modelValue"
            :options="countries"
            option-value="name"
            option-label="name"
            :validate="validate"
            :multiple="multiple"
            :disabled="disabled"
            :filter="filter"
            :placeholder="placeholder"
            :editable="editable"
            :show-clear="showClear"
            :invalid="validate?.$dirty && validate?.$invalid"
            @change="updateValue"
            @blur="validate?.$touch()"
        >
            <template #value="slotProps">
                <div v-if="slotProps.value">
                    {{ $t(`countries.${slotProps.value}`) }}
                </div>
                <span v-else>
                    {{ slotProps.placeholder }}
                </span>