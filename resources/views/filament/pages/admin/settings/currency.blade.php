<x-filament-panels::page>
{{--
    Converted from Vue: Currency.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- PageHeader removed: Use Filament page header configuration --}}

        <div id="currency_table" class="card">
            {{-- Start DataTable --}}
                {{-- Vue slot removed --}}
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ __('admin.currency.no_currencies') }}</p>
                    </div>
                {{-- End Vue slot --}}

                {{-- Start Column --}}
                    {{-- Vue slot removed --}}
                        <i class="mr-2 fa fa-lock"></i>
                        <span>{{ data.name }}</span>
                    {{-- End Vue slot --}}
                {{-- End Column --}}
                {{-- Column (self-closing) --}}
                {{-- Column (self-closing) --}}
                {{-- Column (self-closing) --}}
            {{-- End DataTable --}}
        </div>

        <!-- New edit currency modal -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <form>
                    {{-- SelectInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                    {{-- SelectInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
                </form>
            

            {{-- Vue slot removed --}}
                <div id="function_buttons" class="flex gap-2 flex-wrap">
                    <div class="flex justify-content-end">
                        {{-- Button (self-closing) --}}
                    </div>
                    <div class="flex-grow"></div>
                    <div class="flex justify-content-end gap-2 flex-wrap">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                </div>
            {{-- End Vue slot --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
