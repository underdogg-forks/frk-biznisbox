{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<button type="button" :class="{ 'text-yellow-500': modelValue }" @click="toggleStar" :id="inputId">
        <i class="fa fa-star"></i>
    </button>