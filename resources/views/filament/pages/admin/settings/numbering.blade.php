<x-filament-panels::page>
{{--
    Converted from Vue: Numbering.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- LoadingScreen removed --}}
            <user-header />

            <div class="card">
                <Tabs value="invoice">
                    <TabList>
                        <Tab value="invoice">{{ __('admin.numbering.invoice') }}</Tab>
                        <Tab value="quote">{{ __('admin.numbering.quote') }}</Tab>
                        <Tab value="transaction">{{ __('admin.numbering.transaction') }}</Tab>
                        <Tab value="payment">{{ __('admin.numbering.payment') }}</Tab>
                        <Tab value="partner">{{ __('admin.numbering.partner') }}</Tab>
                        <Tab value="bill">{{ __('admin.numbering.bill') }}</Tab>
                        <Tab value="document">{{ __('admin.numbering.document') }}</Tab>
                        <Tab value="product">{{ __('admin.numbering.product') }}</Tab>
                        <Tab value="employee">{{ __('admin.numbering.employee') }}</Tab>
                        <Tab value="archive">{{ __('admin.numbering.archive') }}</Tab>
                        <Tab value="project">{{ __('admin.numbering.project') }}</Tab>
                        <Tab value="contract">{{ __('admin.numbering.contract') }}</Tab>
                    </TabList>

                    <TabPanels>
                        <!-- Invoice -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Quote -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Transaction -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Payment -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Partner -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Bill -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Document -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Product -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Employee -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Archive -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Project -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                        <!-- Contract -->
                        {{-- Start TabPanel --}}
                            <NumberingInput @update:model-value="updateNumberingModel" />
                        {{-- End TabPanel --}}
                    </TabPanels>
                </Tabs>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
