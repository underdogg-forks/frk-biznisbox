{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div id="header" class="mb-3">
        <div class="flex place-items-center">
            <div class="flex font-semibold text-xl">
                <h3>{{ title }}</h3>
            </div>
            <div class="grow"></div>
            <div class="ml-2 flex gap-2 flex-wrap">
                <slot name="actions"></slot>
            </div>
        </div>
    </div>