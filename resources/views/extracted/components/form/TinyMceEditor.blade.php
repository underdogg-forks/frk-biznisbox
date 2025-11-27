{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="flex flex-col gap-2 mb-2">
        <label :for="id" class="dark:text-surface-200">{{ label }}</label>
        <Editor
            :id="id"
            ref="editor"
            v-model="contentValue"
            model-events="change keydown blur focus paste"
            :disabled="disabled"
            :init="init"
            license-key="gpl"
        />
        <div v-if="validate?.$dirty && validate?.$invalid" class="flex flex-col">
            <div v-for="error in validate?.$errors || []" :key="error?.$propertyPath" class="dark:text-red-400 text-red-500 text-sm">
                {{ error?.$message }}
            </div>
        </div>
    </div>