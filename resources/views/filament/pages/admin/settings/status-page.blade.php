<x-filament-panels::page>
{{--
    Converted from Vue: StatusPage.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    {{-- DefaultLayout removed: Using Filament page structure --}}
        {{-- LoadingScreen removed --}}
            <PageHeader />

            <Message severity="success">
                <div class="flex items-center justify-end">
                    <p>{{ __('admin.status.new_version_available') }}</p>

                    {{-- Start Button --}}
                        <i class="fas fa-info-circle"></i>
                    {{-- End Button --}}
                </div>
            </Message>
            <div id="version_data_card" class="card">
                {{-- DisplayData (self-closing) --}}

                {{-- DisplayData (self-closing) --}}
            </div>

            <div id="storage_used_card" class="card mt-4">
                {{-- DisplayData (self-closing) --}}

                {{-- DisplayData (self-closing) --}}

                {{-- DisplayData (self-closing) --}}

                {{-- DisplayData (self-closing) --}}

                {{-- DisplayData (self-closing) --}}

                {{-- DisplayData (self-closing) --}}

                {{-- DisplayData (self-closing) --}}

                {{-- DisplayData (self-closing) --}}
            </div>
        

        <!-- Changelog dialog -->
        {{-- Start Dialog --}}
            <div class="changelog"></div>
        {{-- End Dialog --}}
    

</x-filament-panels::page>
