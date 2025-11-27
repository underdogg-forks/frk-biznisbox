{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<BlockUI :blocked="blocked">
        <ProgressSpinner v-if="blocked" class="spinner" />
        <slot></slot>
    </BlockUI>