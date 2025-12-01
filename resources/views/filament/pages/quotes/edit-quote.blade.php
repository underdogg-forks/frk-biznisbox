<x-filament-panels::page>
{{--
    Converted from Vue: EditQuote.vue
    
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
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- TextInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- SelectInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- SelectInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
                        {{-- DateInput (self-closing) --}}
                        {{-- DateInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                        {{-- SelectInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div id="item_section" class="grid">
                        <div class="py-2">
                            {{-- Button (self-closing) --}}
                        </div>
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center">{{ __('invoice.no_items') }}</div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <Select
                                        data-key="id"
                                    >
                                        {{-- Vue slot removed --}}
                                            <span>{{ slotProps.value.name }}</span>
                                            <span>{{ slotProps.placeholder }}</span>
                                        {{-- End Vue slot --}}
                                        {{-- Vue slot removed --}}
                                            <span>{{ slotProps.option.name }}</span>
                                        {{-- End Vue slot --}}
                                    </Select>
                                    <span>{{ slotProps.data.name }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- TextAreaInput (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <InputNumber
                                        show-buttons
                                        mode="decimal"
                                    />
                                    <InputNumber
                                        class="mt-0 md:mt-2"
                                        suffix="%"
                                    />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <InputNumber
                                        mode="currency"
                                    />

                                    <Select
                                        class="mt-0 md:mt-2"
                                        option-value="value"
                                        option-label="name"
                                    />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <InputNumber
                                        mode="currency"
                                    />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <div>
                            {{-- TextAreaInput (self-closing) --}}
                            {{-- TinyMceEditor (self-closing) --}}
                        </div>

                        <div>
                            {{-- SelectInput (self-closing) --}}

                            {{-- NumberInput (self-closing) --}}
                            {{-- NumberInput (self-closing) --}}
                            {{-- NumberInput (self-closing) --}}
                        </div>
                    </div>
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end gap-2 mt-4">
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
