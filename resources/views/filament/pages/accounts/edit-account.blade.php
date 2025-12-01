<x-filament-panels::page>
{{--
    Converted from Vue: EditAccount.vue
    
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
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- TextInput (self-closing) --}}
                        <SelectButtonInput
                            id="select_account_type"
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- SelectInput (self-closing) --}}
                        <SelectButtonInput
                            id="is_active_account"
                        />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- NumberInput (self-closing) --}}
                        {{-- DateInput (self-closing) --}}
                    </div>

                    <div id="bank_data">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <SelectButtonInput
                                id="is_default_account"
                            />
                            {{-- TextInput (self-closing) --}}
                            {{-- TextInput (self-closing) --}}
                        </div>
                    </div>

                    <div id="bank_account_details">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            {{-- Start TextInput --}}{{-- End TextInput --}}
                            {{-- Start TextInput --}}{{-- End TextInput --}}
                        </div>

                        {{-- Start TextAreaInput --}}{{-- End TextAreaInput --}}
                    </div>

                    {{-- Start TextAreaInput --}}{{-- End TextAreaInput --}}
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
