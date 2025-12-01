<x-filament-panels::page>
{{--
    Converted from Vue: Quote.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- LoadingScreen removed --}}
        <div>
            <div id="company_data" class="mb-2 d-block p-3">
                <span class="font-bold">{{ formatText($settings.company_name) }}</span
                ><br />
                <span>{{ formatText($settings.company_address) }}</span> <br />
                <span>{{ formatText($settings.company_zip) + ' ' + formatText($settings.company_city) }}</span> <br />
                <span>{{ formatCountry($settings.company_country) }}</span> <br />
                <span>{{ __('form.tax_id') + ': ' + $settings.company_vat }}</span>
            </div>

            <div class="card m-2">
                {{-- PageHeader removed: Use Filament page header configuration --}}

                <div id="alter">
                    <Message severity="error">
                        {{ __('quote.expired') }}
                    </Message>

                    <Message severity="success">
                        {{ __('quote.accepted') }}
                    </Message>

                    <Message severity="error">
                        {{ __('quote.rejected') }}
                    </Message>
                </div>

                <div id="payer_customer_data" class="grid grid-cols-1 md:grid-cols-2">
                    <div id="customer_data">
                        {{-- Start DisplayData --}}
                            <div>
                                <span>{{ formatText(quote.customer_name) }}</span> <br />
                                <span>{{ formatText(quote.customer_address) }}</span>
                                <br />
                                <span>{{ formatText(quote.customer_zip_code) + ' ' + formatText(quote.customer_city) }}</span>
                                <br />
                                <span>{{ formatCountry(quote.customer_country) }}</span>
                                <br />
                            </div>
                            <div>
                                <span>{{ __('quote.no_customer') }}</span>
                            </div>
                        {{-- End DisplayData --}}
                    </div>

                    <div id="payer_data">
                        {{-- Start DisplayData --}}
                            <div>
                                <span>{{ formatText(quote.payer_name) }}</span> <br />
                                <span>{{ formatText(quote.payer_address) }}</span>
                                <br />
                                <span>{{ formatText(quote.payer_zip_code) + ' ' + formatText(quote.payer_city) }}</span>
                                <br />
                                <span>{{ formatCountry(quote.payer_country) }}</span>
                                <br />
                            </div>
                            <div>
                                <span>{{ __('quote.no_payer') }}</span>
                            </div>
                        {{-- End DisplayData --}}
                    </div>
                </div>

                <div id="quote_data" class="grid grid-cols-2 md:grid-cols-4">
                    <div>
                        {{-- DisplayData (self-closing) --}}
                    </div>

                    <div>
                        {{-- DisplayData (self-closing) --}}
                    </div>

                    <div>
                        {{-- Start DisplayData --}}
                            {{-- Start Tag --}}{{ __('status.draft') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.sent') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.viewed') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.accepted') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.cancelled') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.rejected') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.converted') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.expired') }}{{-- End Tag --}}
                        {{-- End DisplayData --}}
                    </div>

                    <div>
                        {{-- DisplayData (self-closing) --}}
                    </div>
                </div>

                <div>
                    {{-- Start DisplayData --}}
                        <span class="flex items-center">
                            <i></i>
                            <span class="ml-1">{{ quote.payment_method.name }}</span>
                        </span>
                        <span>{{ __('quote.no_payment_method') }}</span>
                    {{-- End DisplayData --}}
                </div>

                <div id="quote_items">
                    {{-- Start DataTable --}}
                        {{-- Vue slot removed --}}
                            <div class="p-3 text-center w-full">
                                <i class="fa fa-info-circle empty-icon"></i>
                                <p>
                                    {{ __('quote.no_items') }}
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

                <div id="quote_calculations" class="grid mt-5">
                    <div id="quote_notes">
                        {{-- Start DisplayData --}}
                            <span></span>
                        {{-- End DisplayData --}}
                    </div>

                    <div>
                        <table class="w-full">
                            <tr>
                                <td class="w-6 font-bold mb-1">{{ __('form.discount') }}</td>
                                <td class="text-right">
                                    <span>{{ quote.discount + ' %' }}</span>
                                    <span>{{
                                        quote.discount + ' ' + $settings.default_currency
                                    }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-6 font-bold mb-1">{{ __('form.currency_rate') }}</td>
                                <td class="text-right">
                                    {{ `1 ${$settings.default_currency} = ${quote.currency_rate} ${quote.currency}` }}
                                </td>
                            </tr>
                            <tr>
                                <td class="w-6 font-bold mb-1">{{ __('form.total') }}</td>
                                <td class="text-right">{{ formatMoney(quote.total, quote.currency) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    

</x-filament-panels::page>
