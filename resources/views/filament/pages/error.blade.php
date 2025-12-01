<x-filament-panels::page>
{{--
    Converted from Vue: Error.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    <div id="error_page" class="bg-gradient-to-r from-cyan-500 to-blue-500">
        <div class="flex justify-center items-center h-screen mx-5">
            <div class="p-4 shadow-md w-full border border-surface-300 rounded-md card">
                <div class="text-center">
                    <i class="fa fa-exclamation-triangle text-red-500 fa-5x"></i>
                    <h1 class="text-2xl font-bold mb-4 dark:text-surface-200">
                        {{ __('errors.error_404') }}
                    </h1>
                    <p class="dark:text-surface-200">
                        {{ __('errors.error_404_message') }}
                    </p>
                    <RouterLink to="/" class="font-medium no-underline ml-2 text-blue-500 text-right cursor-pointer hover:underline">
                        {{ __('errors.back_to_dashboard') }}
                    </RouterLink>
                </div>
            </div>
        </div>
    </div>

</x-filament-panels::page>
