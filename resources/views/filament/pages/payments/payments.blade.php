<x-filament-panels::page>
{{--
    Converted from Vue: Payments.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        <PageHeader />

        <div id="payments_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('payment.no_payments') }}</p>
                    </div>
                {{-- End Vue slot --}}

                {{-- Column (self-closing) --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>
                            <i class="fa fa-money-bill"></i>
                            <i class="fa fa-credit-card"></i>
                            <i class="fa fa-university"></i>
                            <i class="fab fa-stripe"></i>
                            <i class="fab fa-paypal"></i>
                            <i class="fab fa-bitcoin"></i>
                            <i class="fa fa-check"></i>
                            <div>
                                <i class="fa fa-money-bill-wave"></i>
                                {{ data.payment_method }}
                            </div>
                        </span>
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ formatMoney(data.amount, data.currency) }}</span>
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Vue slot removed --}}
                    <div>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>
    

</x-filament-panels::page>
