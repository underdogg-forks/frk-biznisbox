<x-filament-panels::page>
{{--
    Converted from Vue: ViewSupportTicket.vue
    
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

            <div class="grid grid-cols-1 md:grid-cols-12 gap-2">
                <!-- Metadata view -->
                <div class="col-span-1 md:col-span-5">
                    <div class="formgrid card">
                        <h1 class="text-xl font-bold mb-4">{{ __('support.ticket_details') }}</h1>
                        {{-- TextInput (self-closing) --}}
                        {{-- TextInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}
                        {{-- SelectInput (self-closing) --}}

                        <div class="flex flex-col gap-2 mb-2">
                            <label for="is_internal_switch" class="dark:text-surface-200">{{ __('form.is_internal') }}</label>
                            <ToggleSwitch
                                id="is_internal_switch"
                            />
                        </div>

                        <div id="partner_input">
                            <div class="flex flex-col gap-2 mb-2">
                                <label for="custom_partner_switch" class="dark:text-surface-200">{{ __('form.custom_contact') }}</label>
                                <ToggleSwitch
                                    id="custom_partner_switch"
                                />
                            </div>
                            {{-- SelectInput (self-closing) --}}

                            {{-- SelectInput (self-closing) --}}

                            <div>
                                {{-- TextInput (self-closing) --}}
                                {{-- TextInput (self-closing) --}}
                                {{-- TextInput (self-closing) --}}
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            {{-- SelectInput (self-closing) --}}
                            {{-- SelectInput (self-closing) --}}
                        </div>
                        {{-- TextAreaInput (self-closing) --}}

                        {{-- Button (self-closing) --}}
                    </div>
                </div>
                <!-- Content view -->
                <div class="col-span-1 md:col-span-7">
                    <div class="card">
                        <h1 class="text-2xl font-bold mb-4">{{ __('form.message') }}</h1>

                        <div>
                            <div id="content_{{ index }}" class="card p-4 mb-4">
                                <div class="flex justify-between items-center">
                                    <div id="content_{{ index }}_from">
                                        <div>
                                            <b>{{ __('form.from') }}: </b>
                                            {{-- Tag (self-closing) --}}
                                        </div>
                                        <div>
                                            <b>{{ __('form.from') }}: </b>
                                            {{-- Tag (self-closing) --}}
                                        </div>
                                    </div>

                                    <div class="flex">
                                        {{-- Button (self-closing) --}}
                                    </div>
                                </div>

                                <div id="content_{{ index }}_message" class="mt-4">
                                    <span></span>
                                </div>

                                <!-- Footer - date -->
                                {{-- Tag (self-closing) --}}
                            </div>
                        </div>

                        <div>
                            <div
                                id="new_replay"
                                class="card p-4 mb-4"
                            >
                                {{-- TinyMceEditor (self-closing) --}}
                                {{-- Button (self-closing) --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        <!-- Share dialog -->
        {{-- Start Dialog --}}
            <div id="share_dialog_content" class="text-center">
                <div>{{ __('support.share_dialog_text') }}</div>

                <div class="flex justify-center my-2">
                    <qrcode-vue level="H" />
                </div>

                <div class="flex gap-2 w-full">
                    <InputText class="w-full" />
                    {{-- Button (self-closing) --}}
                </div>
            </div>
            {{-- Vue slot removed --}}
                {{-- Button (self-closing) --}}
            {{-- End Vue slot --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
