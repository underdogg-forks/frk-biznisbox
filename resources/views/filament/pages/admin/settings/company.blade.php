<x-filament-panels::page>
{{--
    Converted from Vue: Company.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- LoadingScreen removed --}}
            <PageHeader />

            <div id="company_data" class="card">
                <form class="formgrid">
                    <div id="company_logo" class="flex items-center">
                        {{-- Avatar (self-closing) --}}
                        {{-- FileUpload (self-closing) --}}
                    </div>

                    {{-- TextInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-2">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                    </div>

                    <CountrySelect
                    />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- TextInput (self-closing) --}}

                        {{-- TextInput (self-closing) --}}
                    </div>

                    <div class="flex flex-col gap-2 mb-2">
                        <label for="color_input" class="dark:text-surface-200">{{ __('admin.company.company_primary_color') }}</label>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            {{-- ColorPicker (self-closing) --}}
                            {{-- TextInput (self-closing) --}}
                        </div>
                    </div>
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
