<x-filament-panels::page>
{{--
    Converted from Vue: ViewTransaction.vue
    
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- DisplayData (self-closing) --}}
                    <div>
                        {{-- DisplayData (self-closing) --}}
                    </div>
                </div>
                {{-- DisplayData (self-closing) --}}
                {{-- DisplayData (self-closing) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Start DisplayData --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End DisplayData --}}
                    {{-- Start DisplayData --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End DisplayData --}}
                </div>
                {{-- DisplayData (self-closing) --}}
                {{-- DisplayData (self-closing) --}}
                {{-- DisplayData (self-closing) --}}

                <!--Payment method -->
                {{-- Start DisplayData --}}
                    <i></i>
                    {{ transaction.payment_method?.label }}
                {{-- End DisplayData --}}

                {{-- DisplayData (self-closing) --}}
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        <!-- Audit Log Dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
