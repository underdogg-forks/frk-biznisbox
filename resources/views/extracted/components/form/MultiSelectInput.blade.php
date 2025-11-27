{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="flex flex-col gap-2 mb-2">
        <label :for="id" class="dark:text-surface-200">{{ label }}</label>
        <MultiSelect
            :id="id"
            :name="id"
            :model-value="modelValue"
            :options="options"
            :option-value="optionValue"
            :option-label="optionLabel"
            :validate="validate"
            :disabled="disabled"
            :filter="filter"
            display="chip"
            :placeholder="placeholder"
            :editable="editable"
            :show-clear="showClear"
            :invalid="validate?.$dirty && validate?.$invalid"
            @change="updateValue"
            @blur="validate?.$touch()"
        />
        <div v-if="validate && validate?.$dirty && validate.$invalid" class="flex flex-column">
            <div v-for="error in validate.$errors" v-bind:key="error?.$propertyPath" class="dark:text-red-400 text-red-500 text-sm">
                {{ error?.$message }}
            </div>
        </div>
    </div>