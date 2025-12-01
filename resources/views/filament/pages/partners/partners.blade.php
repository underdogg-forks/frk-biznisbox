<x-filament-panels::page>
{{--
    Converted from Vue: Partners.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}
        <div class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('partner.no_partners') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ data.number }}
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by number" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{ data.name }}
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText placeholder="Search by name" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Start Tag --}}{{ __('partner_types.customer') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('partner_types.supplier') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('partner_types.both') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('basic.other') }}{{-- End Tag --}}
                    {{-- End Vue slot --}}
                    {{-- Vue slot removed --}}
                        <InputText type="text" placeholder="Search by type" />
                    {{-- End Vue slot --}}
                {{-- End Column --}}

                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End DataTable --}}
        </div>
    

</x-filament-panels::page>
