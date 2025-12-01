<x-filament-panels::page>
{{--
    Converted from Vue: EditProduct.vue
    
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
            <div class="card">
                <form>
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                        <SelectButtonInput
                            id="select_product_type"
                        />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        {{-- NumberInput (self-closing) --}}
                        {{-- NumberInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- SelectInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        {{-- NumberInput (self-closing) --}}
                        {{-- NumberInput (self-closing) --}}
                        {{-- NumberInput (self-closing) --}}
                    </div>
                    {{-- TextInput (self-closing) --}}
                    {{-- TinyMceEditor (self-closing) --}}
                </form>
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
