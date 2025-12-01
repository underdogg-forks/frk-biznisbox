<x-filament-panels::page>
{{--
    Converted from Vue: ViewEmployee.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- LoadingScreen removed --}}
            {{-- PageHeader removed: Use Filament page header configuration --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="card">
                        <div class="font-bold text-lg">
                            <h3>{{ __('employee.employee_details') }}</h3>
                        </div>
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                    </div>
                </div>

                <div>
                    <div class="card">
                        <Tabs value="address">
                            <TabList>
                                <Tab value="address">{{ __('form.address') }}</Tab>
                                <Tab value="contract">{{ __('employee.contract', 2) }} </Tab>
                            </TabList>

                            {{-- Start TabPanel --}}
                                {{-- DisplayData (self-closing) --}}
                                {{-- DisplayData (self-closing) --}}
                                {{-- DisplayData (self-closing) --}}
                                {{-- DisplayData (self-closing) --}}
                            {{-- End TabPanel --}}
                            {{-- Start TabPanel --}}
                                {{-- DisplayData (self-closing) --}}
                                {{-- DisplayData (self-closing) --}}
                                {{-- Start DisplayData --}}
                                    {{-- Tag (self-closing) --}}
                                {{-- End DisplayData --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    {{-- DisplayData (self-closing) --}}
                                    {{-- DisplayData (self-closing) --}}
                                </div>
                                {{-- Start DisplayData --}}
                                    {{-- Tag (self-closing) --}}
                                {{-- End DisplayData --}}
                                {{-- Start DisplayData --}}
                                    {{-- Tag (self-closing) --}}
                                {{-- End DisplayData --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    {{-- DisplayData (self-closing) --}}
                                    {{-- DisplayData (self-closing) --}}
                                </div>
                            {{-- End TabPanel --}}
                        </Tabs>
                    </div>
                </div>
            </div>
            <div id="function_buttons" class="flex justify-end gap-2 mt-4">
                {{-- Button (self-closing) --}}
            </div>
        

        <!-- Audit Log Dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
