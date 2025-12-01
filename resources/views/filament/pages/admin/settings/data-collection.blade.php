<x-filament-panels::page>
{{--
    Converted from Vue: DataCollection.vue
    
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

            <Tabs class="mb-4">
                <TabList>
                    <Tab value="transaction_categories">{{ __('admin.data_collection.transaction_categories') }}</Tab>
                    <Tab value="document_type">{{ __('admin.data_collection.document_types') }}</Tab>
                    <Tab value="payment_method">{{ __('admin.data_collection.payment_methods') }}</Tab>
                    <Tab value="contract_type">{{ __('admin.data_collection.contract_types') }}</Tab>
                    <Tab value="product_category">{{ __('admin.data_collection.product_categories') }}</Tab>
                    <Tab value="task_category">{{ __('admin.data_collection.task_categories') }}</Tab>
                </TabList>

                <TabPanels>
                    {{-- Start TabPanel --}}
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center w-full">
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('transaction.no_categories') }}</p>
                                </div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.name ? data.name : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>
                                        <i class="fa fa-arrow-up text-green-500 mr-2"></i>
                                        <span>{{ __('transaction_type.income') }}</span>
                                    </span>
                                    <span>
                                        <i class="fa fa-arrow-down text-red-500 mr-2"></i>
                                        <span>{{ __('transaction_type.expense') }}</span>
                                    </span>
                                    <span>
                                        <i class="fa fa-exchange-alt text-blue-500 mr-2"></i>
                                        <span>{{ __('transaction_type.transfer') }}</span>
                                    </span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    {{-- End TabPanel --}}
                    {{-- Start TabPanel --}}
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center w-full">
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('admin.data_collection.no_document_types') }}</p>
                                </div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.name ? data.name : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Column (self-closing) --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <i></i>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <div class="w-4 h-4 rounded-full"></div>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.additional_info ? data.additional_info : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    {{-- End TabPanel --}}
                    {{-- Start TabPanel --}}
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center w-full">
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('admin.data_collection.no_payment_methods') }}</p>
                                </div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <i></i>
                                    <span class="ml-2">{{ data.name ? data.name : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Column (self-closing) --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.additional_info ? __(`payment_methods.${data.additional_info}`) : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    {{-- End TabPanel --}}
                    {{-- Start TabPanel --}}
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center w-full">
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('admin.data_collection.no_contract_types') }}</p>
                                </div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.name ? data.name : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Column (self-closing) --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <i></i>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <div class="w-4 h-4 rounded-full"></div>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.additional_info ? data.additional_info : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    {{-- End TabPanel --}}
                    {{-- Start TabPanel --}}
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center w-full">
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('admin.data_collection.no_product_categories') }}</p>
                                </div>
                            {{-- End Vue slot --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.name ? data.name : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Column (self-closing) --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <i></i>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}

                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    {{-- End TabPanel --}}
                    {{-- Start TabPanel --}}
                        {{-- Start DataTable --}}
                            {{-- Vue slot removed --}}
                                <div class="p-4 pl-0 text-center w-full">
                                    <i class="fa fa-info-circle empty-icon"></i>
                                    <p>{{ __('admin.data_collection.no_task_categories') }}</p>
                                </div>
                            {{-- End Vue slot --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ data.name ? data.name : '-' }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Column (self-closing) --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <i></i>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    {{-- Button (self-closing) --}}
                                    {{-- Button (self-closing) --}}
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    {{-- End TabPanel --}}
                </TabPanels>
            </Tabs>

            <!-- Create and Edit Category Dialog -->
            {{-- Start Dialog --}}
                {{-- LoadingScreen removed --}}
                    <form id="category_form">
                        {{-- Start TextInput --}}{{-- End TextInput --}}
                        {{-- SelectInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}

                        <div class="flex flex-col gap-2 mb-2">
                            <label for="category_color_input" class="dark:text-surface-200">Color</label>
                            {{-- ColorPicker (self-closing) --}}
                        </div>

                        {{-- TextInput (self-closing) --}}

                        {{-- TextInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}

                        {{-- TextInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                    </form>
                

                {{-- Vue slot removed --}}
                    <div id="function_buttons" class="flex justify-end gap-2">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
            {{-- End Dialog --}}
        
    

</x-filament-panels::page>
