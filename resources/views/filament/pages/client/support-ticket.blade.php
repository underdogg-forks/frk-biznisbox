<x-filament-panels::page>
{{--
    Converted from Vue: SupportTicket.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    <div id="client_view_support_ticket" class="p-2">
        {{-- LoadingScreen removed --}}
            <div id="company_data" class="mb-2 d-block p-3">
                <span class="font-bold">{{ formatText($settings.company_name) }}</span
                ><br />
                <span>{{ formatText($settings.company_address) }}</span> <br />
                <span>{{ formatText($settings.company_zip) + ' ' + formatText($settings.company_city) }}</span> <br />
                <span>{{ formatCountry($settings.company_country) }}</span> <br />
                <span>{{ __('form.tax_id') + ': ' + $settings.company_vat }}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-2">
                <!-- Metadata view -->
                <div class="col-span-1 md:col-span-5">
                    <div class="card">
                        {{-- DisplayData (self-closing) --}}
                        {{-- DisplayData (self-closing) --}}

                        <div id="custom_contact">
                            {{-- DisplayData (self-closing) --}}
                            {{-- DisplayData (self-closing) --}}
                            {{-- DisplayData (self-closing) --}}
                        </div>

                        {{-- DisplayData (self-closing) --}}

                        {{-- DisplayData (self-closing) --}}

                        {{-- Start DisplayData --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                        {{-- End DisplayData --}}
                        {{-- Start DisplayData --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                            {{-- Tag (self-closing) --}}
                        {{-- End DisplayData --}}
                    </div>
                </div>
                <!-- Content view -->
                <div class="col-span-1 md:col-span-7">
                    <div class="card">
                        <h1 class="text-2xl font-bold mb-4">{{ __('form.message') }}</h1>
                        <div>
                            <div id="content_{{ index }}" class="card p-4 mb-4">
                                <div id="content_{{ index }}_from" class="mt-4">
                                    <div>
                                        <b>{{ __('form.from') }}: </b>
                                        {{-- Tag (self-closing) --}}
                                    </div>
                                    <div>
                                        <b>{{ __('form.from') }}: </b>
                                        {{-- Tag (self-closing) --}}
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
            <div>
                <p class="text-center text-xl font-bold">
                    {{ __('errors.not_found') }}
                </p>
            </div>
        
    </div>

</x-filament-panels::page>
