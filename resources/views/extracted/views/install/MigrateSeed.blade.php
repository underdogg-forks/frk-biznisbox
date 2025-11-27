{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="container w-full md:w-1/2 mx-auto p-6">
        <div class="card">
            <h1 class="text-2xl font-bold text-center">{{ $t('install.creating_tables') }}</h1>

            <p class="text-center">{{ $t('install.creating_tables_description') }}</p>

            <div class="flex justify-between">
                <ProgressSpinner />
            </div>

            <div v-if="error != ''" class="mt-6 text-center">
                <p class="text-red-500 font-bold">{{ error }}</p>
            </div>
        </div>
    </div>