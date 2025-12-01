<x-filament-panels::page>
{{--
    Converted from Vue: Contracts.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="contracts_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('contract.no_contracts') }}</p>
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
                        <InputText type="text" placeholder="Search by title" />
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
