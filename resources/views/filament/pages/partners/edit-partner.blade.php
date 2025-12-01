<x-filament-panels::page>
{{--
    Converted from Vue: EditPartner.vue
    
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
                        {{-- TextInput (self-closing) --}}
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <SelectButtonInput
                            id="select_partner_entity_type"
                        />

                        <SelectButtonInput
                            id="select_partner_type"
                        />
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- SelectInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        {{-- TextInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
                        <div class="grid grid-cols-1 gap-2">
                            <div class="flex items-end gap-2 content-center">
                                {{-- TextInput (self-closing) --}}
                                {{-- Button (self-closing) --}}
                            </div>
                            <div class="text-red-500 text-sm">
                                {{ vatValidationError }}
                            </div>
                        </div>

                        <!-- Industry select -->
                        {{-- SelectInput (self-closing) --}}
                    </div>
                    <div id="addresses_table_section" class="grid">
                        <div class="my-2">
                            {{-- Button (self-closing) --}}
                        </div>
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center">{{ __('partner.no_addresses') }}</div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- SelectInput (self-closing) --}}
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
                                    <CountrySelect />
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- TextInput (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    </div>

                    <!-- Contact table -->
                    <div id="contacts_table_section" class="grid">
                        <div class="my-2">
                            {{-- Button (self-closing) --}}
                        </div>
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center">{{ __('partner.no_contacts') }}</div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <div class="flex gap-2">
                                        <StarButton />
                                        {{-- TextInput (self-closing) --}}
                                    </div>
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
                                    {{-- TextInput (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    </div>

                    <div class="grid">
                        {{-- TextAreaInput (self-closing) --}}
                    </div>
                </form>
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
