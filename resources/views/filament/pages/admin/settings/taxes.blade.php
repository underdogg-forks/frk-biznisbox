<x-filament-panels::page>
{{--
    Converted from Vue: Taxes.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="tax_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('admin.taxes.no_taxes') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
                {{-- Column (self-closing) --}}
                {{-- Column (self-closing) --}}
                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        {{-- Start Tag --}}{{ __('tax_types.percent') }}{{-- End Tag --}}
                        {{-- Start Tag --}}{{ __('tax_types.fixed') }}{{-- End Tag --}}
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Column (self-closing) --}}
            {{-- End DataTable --}}
        </div>

        <!--Import tax rates modal -->
        {{-- Start Dialog --}}
            <p class="mb-4 block text-gray-600 dark:text-gray-400">
                {{ __('admin.taxes.import_tax_description') }}
            </p>
            {{-- LoadingScreen removed --}}
                {{-- SelectInput (self-closing) --}}
            

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex flex-wrap gap-2">
                    <div class="flex-grow"></div>
                    <div class="flex gap-2 flex-wrap justify-end">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}

        <!-- Edit new tax modal -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <form>
                    {{-- TextInput (self-closing) --}}
                    {{-- TextAreaInput (self-closing) --}}
                    {{-- SelectInput (self-closing) --}}
                    {{-- NumberInput (self-closing) --}}
                </form>
            

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex flex-wrap gap-2">
                    <div class="flex justify-end">
                        {{-- Button (self-closing) --}}
                    </div>
                    <div class="flex-grow"></div>
                    <div class="flex gap-2 flex-wrap justify-end">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
