<x-filament-panels::page>
{{--
    Converted from Vue: ViewInvoice.vue
    
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
                <div id="payer_customer_data" class="grid grid-cols-1 lg:grid-cols-2">
                    <div id="customer_data">
                        {{-- Start DisplayData --}}
                            <div>
                                <span>{{ formatText(invoice.customer_name) }}</span>
                                <br />
                                <span>{{ formatText(invoice.customer_address) }}</span>
                                <br />
                                <span>{{ formatText(invoice.customer_zip_code) + ' ' + formatText(invoice.customer_city) }}</span>
                                <br />
                                <span>{{ formatCountry(invoice.customer_country) }}</span>
                                <br />
                            </div>
                            <div>
                                <span> {{ __('invoice.no_customer') }}</span>
                            </div>
                        {{-- End DisplayData --}}
                    </div>

                    <div id="payer_data">
                        {{-- Start DisplayData --}}
                            <div>
                                <span>{{ formatText(invoice.payer_name) }}</span> <br />
                                <span>{{ formatText(invoice.payer_address) }}</span>
                                <br />
                                <span>{{ formatText(invoice.payer_zip_code) + ' ' + formatText(invoice.payer_city) }}</span>
                                <br />
                                <span>{{ formatCountry(invoice.payer_country) }}</span>
                                <br />
                            </div>
                            <div>
                                <span>{{ __('invoice.no_payer') }}</span>
                            </div>
                        {{-- End DisplayData --}}
                    </div>
                </div>

                <div id="invoice_data" class="grid grid-cols-1 lg:grid-cols-4">
                    <div>
                        {{-- DisplayData (self-closing) --}}
                    </div>

                    <div>
                        {{-- DisplayData (self-closing) --}}
                    </div>

                    <div>
                        {{-- Start DisplayData --}}
                            {{-- Start Tag --}}{{ __('status.paid') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.unpaid') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.overdue') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.draft') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.sent') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.refunded') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.partial') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.overpaid') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.cancelled') }}{{-- End Tag --}}
                        {{-- End DisplayData --}}
                    </div>

                    <div>
                        {{-- DisplayData (self-closing) --}}
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div>
                        {{-- Start DisplayData --}}
                            <span>{{
                                invoice.sales_person?.first_name + ' ' + invoice.sales_person?.last_name
                            }}</span>
                            <span>{{ __('invoice.no_sales_person') }}</span>
                        {{-- End DisplayData --}}
                    </div>

                    <div>
                        {{-- Start DisplayData --}}
                            <span class="flex items-center">
                                <i></i>
                                <span class="ml-1">{{ invoice.payment_method.name }}</span>
                            </span>
                            <span>{{ __('invoice.no_payment_method') }}</span>
                        {{-- End DisplayData --}}
                    </div>
                </div>

                <div id="invoice_items">
                    {{-- Start DataTable --}}
                        {{-- Vue slot removed --}}
                            <div class="p-3 text-center w-full">
                                <i class="fa fa-info-circle empty-icon"></i>
                                <p>
                                    {{ __('invoice.no_items') }}
                                </p>
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
                                <span>{{ data.price + ' ' + $settings.default_currency }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>{{ data.tax !== null ? data.tax + ' %' : '-' }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>{{ data.discount + ' %' }}</span>
                                <span>{{ data.discount + ' ' + $settings.default_currency }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>{{ data.total + ' ' + $settings.default_currency }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                    {{-- End DataTable --}}
                </div>

                <div id="invoice_calculations" class="grid grid-cols-1 lg:grid-cols-2">
                    <div id="invoice_notes">
                        {{-- Start DisplayData --}}
                            <span></span>
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            <span></span>
                        {{-- End DisplayData --}}
                    </div>

                    <div id="invoice_calculations_table">
                        <div id="invoice_discount_exchange_info">
                            {{-- Start DisplayData --}}
                                <span>{{ invoice.discount + ' %' }}</span>
                                <span>{{
                                    invoice.discount + ' ' + $settings.default_currency
                                }}</span>
                            {{-- End DisplayData --}}

                            {{-- Start DisplayData --}}
                                {{ `1 ${$settings.default_currency} = ${invoice.currency_rate} ${invoice.currency}` }}
                            {{-- End DisplayData --}}

                            <div id="invoice_tax_info">
                                {{-- Start DisplayData --}}
                                    <div>
                                        {{-- Start DisplayData --}}
                                            {{ formatMoney(tax.amount, invoice.currency) }}
                                        {{-- End DisplayData --}}
                                    </div>
                                {{-- End DisplayData --}}
                            </div>

                            {{-- Start DisplayData --}}
                                {{ formatMoney(invoice.total, invoice.currency) }}
                            {{-- End DisplayData --}}
                        </div>
                    </div>
                </div>
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        <!-- Share dialog -->
        {{-- Start Dialog --}}
            <div id="share_dialog_content">
                <div class="text-center">{{ __('invoice.share_dialog_text') }}</div>

                <div class="flex justify-center my-2">
                    <qrcode-vue level="H" />
                </div>

                <div class="flex gap-2 w-full">
                    <InputText class="w-full" />
                    {{-- Button (self-closing) --}}
                </div>
            </div>
            {{-- Vue slot removed --}}
                {{-- Button (self-closing) --}}
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- Show transactions dialog -->
        {{-- Start Dialog --}}
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full text-gray-500">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('transaction.no_transactions') }}</p>
                    </div>
                {{-- End Vue slot --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ data.name ? data.name : '-' }}</span>
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
            {{-- End DataTable --}}

            <div class="grid grid-cols-2 gap-2">
                {{-- DisplayData (self-closing) --}}
                {{-- DisplayData (self-closing) --}}
            </div>

            {{-- Vue slot removed --}}
                {{-- Button (self-closing) --}}
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- Add transaction dialog -->
        {{-- Start Dialog --}}
            <div>
                <form>
                    {{-- DateInput (self-closing) --}}
                    {{-- NumberInput (self-closing) --}}
                </form>
            </div>

            {{-- Vue slot removed --}}
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
