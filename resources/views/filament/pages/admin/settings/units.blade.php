<x-filament-panels::page>
{{--
    Converted from Vue: Units.vue
    
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
                        <p>{{ __('admin.units.no_units') }}</p>
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
                {{-- Column (self-closing) --}}
                {{-- Column (self-closing) --}}
                {{-- Column (self-closing) --}}
            {{-- End DataTable --}}
        </div>

        <!-- Edit new unit modal -->
        {{-- Start Dialog --}}
            {{-- LoadingScreen removed --}}
                <form>
                    {{-- TextInput (self-closing) --}}
                    {{-- TextAreaInput (self-closing) --}}
                    {{-- TextInput (self-closing) --}}
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
