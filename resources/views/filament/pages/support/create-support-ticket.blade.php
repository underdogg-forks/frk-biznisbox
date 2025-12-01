<x-filament-panels::page>
{{--
    Converted from Vue: CreateSupportTicket.vue
    
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

            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <!-- Metadata view -->
                <div class="col-span-1 md:col-span-4">
                    <div class="formgrid card">
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}

                        <div class="flex flex-col gap-2 mb-2">
                            <label for="is_internal_switch" class="dark:text-surface-200">{{ __('form.is_internal') }}</label>
                            <ToggleSwitch id="is_internal_switch" />
                        </div>

                        <div id="partner_input">
                            <div class="flex flex-col gap-2 mb-2">
                                <label for="custom_partner_switch" class="dark:text-surface-200">{{ __('form.custom_contact') }}</label>
                                <ToggleSwitch id="custom_partner_switch" />
                            </div>
                            {{-- SelectInput (self-closing) --}}

                            {{-- SelectInput (self-closing) --}}

                            <div>
                                {{-- TextInput (self-closing) --}}
                                {{-- TextInput (self-closing) --}}
                                {{-- TextInput (self-closing) --}}
                            </div>
                        </div>

                        <div class="grid">
                            {{-- SelectInput (self-closing) --}}
                            {{-- SelectInput (self-closing) --}}
                        </div>
                        <div class="grid">
                            {{-- TextAreaInput (self-closing) --}}
                        </div>
                    </div>
                </div>
                <!-- Content view -->
                <div class="cols-span-1 md:col-span-8">
                    <div class="card">
                        {{-- TinyMceEditor (self-closing) --}}
                    </div>
                </div>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
