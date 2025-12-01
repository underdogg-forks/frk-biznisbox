<x-filament-panels::page>
{{--
    Converted from Vue: ViewProduct.vue
    
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
                <form class="formgrid">
                    <div class="grid md:grid-cols-3 grid-cols-1 gap-2">
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- Start DisplayData --}}
                            {{-- Tag (self-closing) --}}
                        {{-- End DisplayData --}}
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        {{-- DisplayData (self-closing) --}}
                        {{-- Start DisplayData --}}
                            <div class="flex">
                                <i></i>
                                <span class="ml-2">{{ product.category.name }}</span>
                            </div>
                        {{-- End DisplayData --}}
                        {{-- DisplayData (self-closing) --}}
                    </div>

                    {{-- Start DisplayData --}}
                        <div></div>
                    {{-- End DisplayData --}}
                </form>
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
