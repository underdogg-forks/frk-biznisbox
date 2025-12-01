<x-filament-panels::page>
{{--
    Converted from Vue: CreateDepartment.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        <loadingScreen>
            <PageHeader />

            <div class="card">
                <form>
                    {{-- TextInput (self-closing) --}}
                    {{-- TextAreaInput (self-closing) --}}

                    {{-- SelectInput (self-closing) --}}

                    <div class="my-4">
                        {{-- Button (self-closing) --}}
                    </div>

                    {{-- TextInput (self-closing) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                    </div>
                    <CountrySelect
                        id="input_country"
                    />
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                    </div>

                    {{-- Button (self-closing) --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- TextInput (self-closing) --}}

                        {{-- TextInput (self-closing) --}}
                    </div>
                </form>
            </div>
        </loadingScreen>
        <div id="function_buttons" class="flex justify-end mt-4 gap-2">
            {{-- Button (self-closing) --}}
            {{-- Button (self-closing) --}}
        </div>
    

</x-filament-panels::page>
