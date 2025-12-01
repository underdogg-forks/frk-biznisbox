<x-filament-panels::page>
{{--
    Converted from Vue: Invoices.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="invoice_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('invoice.no_invoices') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by number" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ formatDate(data.date) }}</span> <br />
                        <span>{{ formatDate(data.due_date) }}</span>
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by date" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ formatText(data.customer_name) }} <br />
                        {{ formatText(data.payer_name) }}
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ formatMoney(data.total, data.currency) }}
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by total" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Start Tag --}}{{ __('status.paid') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.unpaid') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.overdue') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.draft') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.sent') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.refunded') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.cancelled') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.partial') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.overpaid') }}{{-- End Tag --}}
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <Select
                            option-label="label"
                            option-value="value"
                            show-clear
                        />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>
    

</x-filament-panels::page>
