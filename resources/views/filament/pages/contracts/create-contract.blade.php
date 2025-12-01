<x-filament-panels::page>
{{--
    Converted from Vue: CreateContract.vue
    
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
                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div>
                        {{-- TextInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- SelectInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- DateInput (self-closing) --}}
                        {{-- DateInput (self-closing) --}}
                        {{-- DateInput (self-closing) --}}
                    </div>

                    <div id="signers_table" class="overflow-x-auto">
                        <div class="py-2">
                            {{-- Button (self-closing) --}}
                        </div>
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center">{{ __('contract.no_signers') }}</div>
                            {{-- End Vue slot --}}

                            {{-- Column (self-closing) --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <Select
                                        data-key="id"
                                        option-value="id"
                                        option-label="full_name"
                                        filter
                                        showClear
                                        class="w-full"
                                    />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- TextInput (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- TextInput (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- TextInput (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- TextInput (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- SelectInput (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    </div>

                    <div>
                        {{-- TextAreaInput (self-closing) --}}
                        {{-- TinyMceEditor (self-closing) --}}
                    </div>
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
