<x-filament-panels::page>
{{--
    Converted from Vue: ViewBill.vue
    
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

            <div class="card">
                <div class="grid grid-cols-1">
                    <div id="supplier_data">
                        {{-- Start DisplayData --}}
                            <div>
                                <span>{{ bill.supplier_id ? formatText(bill?.supplier_name) : '' }}</span> <br />
                                <span>{{ bill.supplier_address_id ? formatText(bill?.supplier_address) : '' }}</span>
                                <br />
                                <span>{{
                                    bill.supplier_address_id
                                        ? formatText(bill?.supplier_zip_code) + ' ' + formatText(bill.supplier_city)
                                        : ''
                                }}</span>
                                <br />
                                <span>{{ bill.supplier_address_id ? formatText(bill?.supplier_country) : '' }}</span>
                                <br />
                            </div>
                            <div>
                                <span> {{ __('bill.no_supplier') }}</span>
                            </div>
                        {{-- End DisplayData --}}
                    </div>
                </div>
                <div id="bill_data" class="grid grid-cols-1 md:grid-cols-3">
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- Start DisplayData --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End DisplayData --}}
                </div>

                <div>
                    {{-- Start DisplayData --}}
                        <span class="flex items-center">
                            <i></i>
                            <span class="ml-1">{{ bill.payment_method.name }}</span>
                        </span>
                        <span>{{ __('bill.no_payment_method') }}</span>
                    {{-- End DisplayData --}}
                </div>

                <div id="bill_items">
                    {{-- Start DataTable --}}
                        {{-- Vue slot removed --}}
                            <div class="p-4 pl-0 text-center w-full">
                                <i class="fa fa-info-circle empty-icon"></i>
                                <p>{{ __('bill.no_items') }}</p>
                            </div>
                        {{-- End Vue slot --}}

                        {{-- Column (self-closing) --}}
                        {{-- Column (self-closing) --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>{{ data.quantity + ' ' + data.unit }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>{{ formatMoney(data.price) }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>{{ formatMoney(data.total) }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                    {{-- End DataTable --}}
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div id="bill_notes">
                        {{-- Start DisplayData --}}
                            <span></span>
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            <span></span>
                        {{-- End DisplayData --}}
                    </div>

                    <div id="bill_calculations_table">
                        {{-- Start DisplayData --}}
                            <span>{{ bill.discount + ' %' }}</span>
                            <span>{{ bill.discount + ' ' + $settings.default_currency }}</span>
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            {{ `1 ${$settings.default_currency} = ${bill.currency_rate} ${bill.currency}` }}
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            {{ formatMoney(bill.total, bill.currency) }}
                        {{-- End DisplayData --}}
                    </div>
                </div>
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        <!-- Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
