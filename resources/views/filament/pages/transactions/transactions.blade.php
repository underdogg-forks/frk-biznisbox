<x-filament-panels::page>
{{--
    Converted from Vue: Transactions.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="transactions_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('transaction.no_transactions') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ data.name ? data.name : '-' }}</span>
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by name" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ data.date ? formatDate(data.date) : '-' }}</span
                        ><br />
                        <span>{{ data.number }}</span>
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by date" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ formatMoney(data.amount, data.currency) }}</span> <br />
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by amount" />
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

                    {{-- Vue slot removed --}}
                        <Select
                            option-label="label"
                            option-value="value"
                            placeholder="Search by type"
                        />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ data.account ? data.account?.name : '-' }}
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by account" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}

            <!-- Categories list -->
            {{-- Start Dialog --}}
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

                {{-- Vue slot removed --}}
                    <div id="function_buttons" class="flex justify-end mt-2 gap-2">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
            {{-- End Dialog --}}

            <!-- New/Edit category dialog -->
            {{-- Start Dialog --}}
                {{-- LoadingScreen removed --}}
                    <form id="category_form">
                        {{-- Start TextInput --}}{{-- End TextInput --}}
                        {{-- SelectInput (self-closing) --}}
                    </form>
                

                {{-- Vue slot removed --}}
                    <div id="function_buttons" class="flex justify-end gap-2">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
            {{-- End Dialog --}}
        </div>
    

</x-filament-panels::page>
