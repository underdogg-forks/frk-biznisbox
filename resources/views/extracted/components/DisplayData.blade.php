{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div v-if="value !== null || (value == null && customValue)" class="mb-2" :id="`display_data_${input.toLowerCase()}`">
        <!-- Display the input inline with the value -->
        <div v-if="displayInline && !customValue" class="inline-flex items-center">
            <span class="font-bold mr-2">{{ input }}</span>
            <span>{{ value }}</span>
        </div>
        <!-- Display the input inline with a custom value -->
        <div v-if="displayInline && customValue" class="inline-flex items-center">
            <span class="font-bold mr-2">{{ input }}</span>
            <slot></slot>
        </div>

        <!-- Display the input and value in a block format -->
        <div v-if="!displayInline">
            <div class="font-bold mb-1">
                {{ input }}
            </div>
            <div v-if="customValue">
                <slot></slot>
            </div>
            <div v-else-if="isLink">
                <a :href="!link ? value : link" target="_blank" class="text-blue-500 break-word">
                    {{ value }}
                </a>
            </div>
            <div v-else class="break-word">
                {{ value }}
            </div>
        </div>
    </div>