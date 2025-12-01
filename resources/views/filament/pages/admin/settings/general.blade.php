<x-filament-panels::page>
{{--
    Converted from Vue: General.vue
    
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

            <div class="card">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- SelectInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        {{-- SelectInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        {{-- SelectInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}

                        {{-- SelectInput (self-closing) --}}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <div class="flex flex-col gap-2 mb-2">
                            <label for="show_barcode_on_documents" class="dark:text-surface-200"
                                >{{ __('admin.general.show_barcode_on_documents') }}
                            </label>
                            <ToggleSwitch id="show_barcode_on_documents_switch" />
                        </div>

                        <div class="flex flex-col gap-2 mb-2">
                            <label for="save_document_into_archive" class="dark:text-surface-200"
                                >{{ __('admin.general.save_document_into_archive') }}
                            </label>
                            <ToggleSwitch id="save_document_into_archive_switch" />
                        </div>

                        {{-- SelectInput (self-closing) --}}
                    </div>
                </form>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
