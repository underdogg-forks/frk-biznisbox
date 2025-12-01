<x-filament-panels::page>
{{--
    Converted from Vue: ViewAccount.vue
    
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
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-4">
                    <div class="card">
                        <div class="mb-2 font-bold">
                            <h3>{{ __('account.account_details') }}</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            {{-- DisplayData (self-closing) --}}
                            <div>
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            {{-- DisplayData (self-closing) --}}
                            {{-- DisplayData (self-closing) --}}
                        </div>
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- Start DisplayData --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                        {{-- End DisplayData --}}
                        {{-- DisplayData (self-closing) --}}
                    </div>
                </div>
                <div class="col-span-12 md:col-span-8">
                    <div class="card">
                        <Tabs value="transactions">
                            <TabList>
                                <Tab value="transactions">{{ __('transaction.transaction', 2) }}</Tab>
                                <Tab value="bank_details">{{ __('account.bank_details') }}</Tab>
                            </TabList>

                            <TabPanels>
                                {{-- Start TabPanel --}}
                                    {{-- Start DataTable --}}
                                        {{-- Vue slot removed --}}
                                            <div class="p-3 pl-0 text-center w-full">
                                                <i class="fa fa-info-circle empty-icon"></i>
                                                <p>{{ __('transaction.no_transactions') }}</p>
                                            </div>
                                        {{-- End Vue slot --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <span>{{ data.name }}</span>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <span>{{ data.date ? formatDate(data.date) : '-' }}</span
                                                ><br />
                                                <span>{{ data.number }}</span>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Start Column --}}
                                            {{-- Vue slot removed --}}
                                                <span>{{ data.amount ? formatMoney(data.amount, data.currency) : '-' }}</span> <br />
                                                <div>
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
                                                </div>
                                            {{-- End Vue slot --}}
                                        {{-- End Column --}}
                                        {{-- Vue slot removed --}}
                                            {{-- Button (self-closing) --}}
                                        {{-- End Vue slot --}}
                                    {{-- End DataTable --}}
                                {{-- End TabPanel --}}

                                {{-- Start TabPanel --}}
                                    {{-- DisplayData (self-closing) --}}
                                    {{-- DisplayData (self-closing) --}}
                                    {{-- DisplayData (self-closing) --}}
                                    {{-- DisplayData (self-closing) --}}
                                    {{-- DisplayData (self-closing) --}}
                                {{-- End TabPanel --}}
                            </TabPanels>
                        </Tabs>
                    </div>
                    <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            </div>
        

        <!-- Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
