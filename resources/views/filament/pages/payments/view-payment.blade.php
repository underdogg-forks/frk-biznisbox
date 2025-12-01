<x-filament-panels::page>
{{--
    Converted from Vue: ViewPayment.vue
    
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
                {{-- DisplayData (self-closing) --}}
                {{-- Start DisplayData --}}
                    <span style="font-size: 25px">
                        <i class="fa fa-money-bill"></i>
                        <i class="fa fa-credit-card"></i>
                        <i class="fa fa-university"></i>
                        <i class="fab fa-stripe"></i>
                        <i class="fab fa-paypal"></i>
                        <i class="fab fa-bitcoin"></i>
                        <i class="fa fa-check"></i>
                        <div>
                            <i class="fa fa-money-bill-wave"></i>
                            {{ payment.payment_method }}
                        </div>
                    </span>
                {{-- End DisplayData --}}

                {{-- DisplayData (self-closing) --}}

                {{-- Start DisplayData --}}
                    {{-- Tag (self-closing) --}}
                    {{-- Tag (self-closing) --}}
                    {{-- Tag (self-closing) --}}
                    {{-- Tag (self-closing) --}}
                    {{-- Tag (self-closing) --}}
                    {{-- Tag (self-closing) --}}
                {{-- End DisplayData --}}
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
