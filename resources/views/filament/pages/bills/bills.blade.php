<x-filament-panels::page>
{{--
    Converted from Vue: Bills.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="bills_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('bill.no_bills') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ data.number }}
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by number" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ data.supplier_name }}
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by supplier" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <span class="date">{{ data.date ? formatDate(data.date) : '-' }}</span> <br />
                        <span class="due_date">{{ data.due_date ? formatDate(data.due_date) : '-' }}</span>
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <div class="flex">
                            <InputText type="text" placeholder="Search by date" />
                        </div>
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <div class="status">
                            {{-- Start Tag --}}{{ __('status.paid') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.unpaid') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.overdue') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.draft') }}{{-- End Tag --}}
                            {{-- Start Tag --}}{{ __('status.cancelled') }}{{-- End Tag --}}
                        </div>
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <Select
                            option-label="label"
                            option-value="value"
                            placeholder="Search by status"
                        />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <div class="total">
                            {{ formatMoney(data.total, data.currency) }}
                        </div>
                    {{-- End Vue slot --}}

                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by total" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>
    

</x-filament-panels::page>
