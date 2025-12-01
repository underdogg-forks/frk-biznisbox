<x-filament-panels::page>
{{--
    Converted from Vue: Invoice.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    <div id="client_view_invoice_page" class="p-2">
        {{-- LoadingScreen removed --}}
            <div>
                <div id="company_data" class="p-3">
                    <span class="font-bold">{{ formatText($settings.company_name) }}</span
                    ><br />
                    <span>{{ formatText($settings.company_address) }}</span> <br />
                    <span>{{ formatText($settings.company_zip) + ' ' + formatText($settings.company_city) }}</span> <br />
                    <span>{{ formatCountry($settings.company_country) }}</span> <br />
                    <span>{{ __('form.tax_id') + ': ' + $settings.company_vat }}</span>
                </div>

                <div class="card m-2">
                    {{-- PageHeader removed: Use Filament page header configuration --}}

                    <div class="py-3">
                        <Message severity="success" closable>
                            {{ __('invoice.payment_success') }}
                        </Message>

                        <Message severity="error" closable>
                            {{ __('invoice.payment_error') }}
                        </Message>
                    </div>

                    <div id="payer_customer_data" class="grid grid-cols-1 md:grid-cols-2">
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
                                    <span>{{ __('invoice.no_customer') }}</span>
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

                    <div id="invoice_data" class="grid grid-cols-1 md:grid-cols-4">
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
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
                        {{-- DisplayData (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2">
                        {{-- Start DisplayData --}}
                            <span>{{
                                invoice.sales_person?.first_name + ' ' + invoice.sales_person?.last_name
                            }}</span>
                            <span>{{ __('invoice.no_sales_person') }}</span>
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            <span class="flex items-center">
                                <i></i>
                                <span class="ml-1">{{ invoice.payment_method.name }}</span>
                            </span>
                            <span>{{ __('invoice.no_payment_method') }}</span>
                        {{-- End DisplayData --}}
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
                                    <span>{{ formatMoney(data.price) }}</span>
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
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                            {{-- Start Column --}}
                                {{-- Vue slot removed --}}
                                    <span>{{ formatMoney(data.total) }}</span>
                                {{-- End Vue slot --}}
                            {{-- End Column --}}
                        {{-- End DataTable --}}
                    </div>

                    <div id="invoice_calculations" class="grid mt-5 grid-cols-1 md:grid-cols-2">
                        <div id="invoice_footer">
                            {{-- Start DisplayData --}}
                                <span></span>
                            {{-- End DisplayData --}}
                        </div>

                        <div id="invoice_calculations_table">
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

            <!-- Show transactions table dialog -->
            {{-- Start Dialog --}}
                <div id="show_transactions_dialog_content">
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
                                <span>{{ formatMoney(data.amount, data.currency) }}</span> <br />
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
                </div>
                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End Dialog --}}

            <!-- Select payment Gateway dialog -->
            {{-- Start Dialog --}}
                <div class="grid grid-cols-1 gap-2 p-3" id="available_payment_gateways_dialog_content">
                    <div
                        class="flex items-center space-x-4 border p-4 rounded-lg transition-shadow hover:shadow-lg focus:shadow-lg cursor-pointer outline-none"
                    >
                        <i aria-hidden="true"></i>
                        <span class="text-base font-medium text-gray-800 dark:text-gray-200">
                            {{ paymentGateway.name }}
                        </span>
                    </div>
                </div>
            {{-- End Dialog --}}
        
    </div>

</x-filament-panels::page>
