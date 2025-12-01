<x-filament-panels::page>
{{--
    Converted from Vue: ViewQuote.vue
    
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
                <div id="payer_customer_data" class="grid mt-5 lg:grid-cols-2 grid-cols-1">
                    <div id="customer_data">
                        {{-- Start DisplayData --}}
                            <div>
                                <span>{{ formatText(quote.customer_name) }}</span>
                                <br />
                                <span>{{ formatText(quote.customer_address) }}</span>
                                <br />
                                <span>{{ formatText(quote.customer_zip_code) + ' ' + formatText(quote.customer_city) }}</span>
                                <br />
                                <span>{{ formatCountry(quote.customer_country) }}</span>
                                <br />
                            </div>
                            <div>
                                <span> {{ __('quote.no_customer') }}</span>
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

                <div id="quote_data" class="grid lg:grid-cols-4 grid-cols-2">
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- Start DisplayData --}}
                        {{-- Start Tag --}}{{ __('status.accepted') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.rejected') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.draft') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.sent') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.viewed') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.expired') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.cancelled') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.converted') }}{{-- End Tag --}}
                    {{-- End DisplayData --}}
                    {{-- DisplayData (self-closing) --}}
                </div>

                <div>
                    <div>
                        {{-- Start DisplayData --}}
                            <span class="flex items-center">
                                <i></i>
                                <span class="ml-1">{{ quote.payment_method.name }}</span>
                            </span>
                            <span>{{ __('quote.no_payment_method') }}</span>
                        {{-- End DisplayData --}}
                    </div>
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
                                <span>
                                    {{ data.quantity + ' ' + data.unit }}
                                </span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                        {{-- Start Column --}}
                            {{-- Vue slot removed --}}
                                <span>
                                    {{ formatMoney(data.price, quote.currency) }}
                                </span>
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
                                <span> {{ (data.total, quote.currency) }}</span>
                            {{-- End Vue slot --}}
                        {{-- End Column --}}
                    {{-- End DataTable --}}
                </div>

                <div id="quote_calculations" class="grid grid-cols-2">
                    <div id="quote_notes">
                        {{-- Start DisplayData --}}
                            <span></span>
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            <span></span>
                        {{-- End DisplayData --}}
                    </div>

                    <div id="quote_calculations_table">
                        {{-- Start DisplayData --}}
                            <span>{{ quote.discount + ' %' }}</span>
                            <span>{{ quote.discount + ' ' + $settings.default_currency }}</span>
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            {{ `1 ${$settings.default_currency} = ${quote.currency_rate} ${quote.currency}` }}
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            {{ formatMoney(quote.total, quote.currency) }}
                        {{-- End DisplayData --}}
                    </div>
                </div>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        <!--Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}

        <!--Quote share dialog -->
        {{-- Start Dialog --}}
            <div id="share_dialog_content">
                <div class="text-center">{{ __('quote.share_dialog_text') }}</div>

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
    

</x-filament-panels::page>
