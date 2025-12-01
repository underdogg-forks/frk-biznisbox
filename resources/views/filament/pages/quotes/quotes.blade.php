<x-filament-panels::page>
{{--
    Converted from Vue: Quotes.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="quote_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('quote.no_quotes') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by number" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span>{{ data.date ? formatDate(data.date) : '' }}</span> <br />
                        <span>{{ data.valid_until ? formatDate(data.valid_until) : '' }}</span>
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <div class="flex">
                            <InputText placeholder="Search by date" />
                        </div>
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
                        <InputText placeholder="Search by total" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Start Tag --}}{{ __('status.accepted') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.rejected') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.draft') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.sent') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.viewed') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.expired') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.cancelled') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('status.converted') }}{{-- End Tag --}}
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <Select
                            option-label="label"
                            option-value="value"
                            placeholder="Select a status"
                        />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>
    

</x-filament-panels::page>
