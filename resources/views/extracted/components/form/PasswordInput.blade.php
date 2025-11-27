{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="flex flex-col gap-2 mb-2">
        <label :for="id" class="dark:text-surface-200">{{ label }}</label>
        <Password
            :id="id"
            :name="id"
            :model-value="modelValue"
            :validate="validate"
            :disabled="disabled"
            :placeholder="placeholder"
            input-class="w-full"
            :feedback="feedback"
            :toggle-mask="true"
            :input-id="id"
            :invalid="validate?.$dirty && validate?.$invalid"
            @input="updateValue"
            @blur="validate?.$touch()"
            :inputProps="{ autocomplete: autocomplete }"
        />
        <div v-if="validate && validate?.$dirty && validate?.$invalid" class="flex flex-column">
            <div v-for="error in validate.$errors" v-bind:key="error?.$propertyPath" class="dark:text-red-400 text-red-500 text-sm">
                {{ error?.$message }}
            </div>
        </div>
    </div>