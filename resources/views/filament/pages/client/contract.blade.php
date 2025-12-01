<x-filament-panels::page>
{{--
    Converted from Vue: Contract.vue
    
    CONVERSION NOTES:
    - All Vue directives (v-if, v-for, @click, :prop, etc.) have been removed
    - Vue components have been commented out - replace with Filament/Blade equivalents
    - {{ }} expressions are preserved but may reference Vue data - update as needed
    - Translation calls $t() have been converted to __()
    - This file requires significant manual work to become functional
--}}


    <div id="client_view_contract_page" class="p-2">
        {{-- LoadingScreen removed --}}
            <div>
                <div id="company_data" class="p-3">
                    <span class="font-bold">{{ formatText($settings.company_name) }}</span
                    ><br />
                    <span>{{ formatText($settings.company_address) }}</span> <br />
                    <span>{{ formatText($settings.company_zip) + ' ' + formatText($settings.company_city) }}</span> <br />
                    <span>{{ formatCountry($settings.company_country) }}</span> <br />
                    <span>{{ __('form.tax_id') + ': ' + $settings.company_vat }}</span>
                </div>

                <div class="card m-2">
                    {{-- PageHeader removed: Use Filament page header configuration --}}

                    <div id="contract_data">
                        <div class="grid md:grid-cols-3 grid-cols-1 gap-2">
                            {{-- DisplayData (self-closing) --}}
                            {{-- DisplayData (self-closing) --}}
                            {{-- Start DisplayData --}}
                                {{-- Tag (self-closing) --}}
                            {{-- End DisplayData --}}
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                            {{-- Start DisplayData --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                                {{-- Tag (self-closing) --}}
                            {{-- End DisplayData --}}

                            {{-- DisplayData (self-closing) --}}
                            {{-- DisplayData (self-closing) --}}
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                            {{-- DisplayData (self-closing) --}}
                            {{-- DisplayData (self-closing) --}}
                            {{-- DisplayData (self-closing) --}}
                        </div>

                        <div id="partner_data">
                            {{-- Start DisplayData --}}
                                <div>
                                    <span>{{ formatText(contract.partner?.name) }}</span>
                                    <br />
                                </div>
                                <div>
                                    <span> {{ __('contract.no_partner') }}</span>
                                </div>
                            {{-- End DisplayData --}}
                        </div>

                        {{-- Start DisplayData --}}
                            <div>
                                <div></div>
                            </div>
                            <div>
                                <span>{{ __('contract.no_content') }}</span>
                            </div>
                        {{-- End DisplayData --}}

                        {{-- Start DisplayData --}}
                            <ul id="signers-list">
                                <li class="mb-4">
                                    <div>
                                        <span class="font-bold">{{ signer.signer_name }}</span>
                                        <div>
                                            <img alt="Signature" class="w-56 h-16" />
                                        </div>

                                        <div>
                                            <span class="text-red-400">{{ __('status.rejected') }}</span>
                                        </div>
                                        <span class="text-red-400 block">{{ __('contract.not_signed') }}</span>
                                    </div>
                                    <div>
                                        <strong>{{ __('form.notes') }}:</strong>
                                        <span>{{ signer.notes }}</span>
                                    </div>
                                </li>
                            </ul>
                        {{-- End DisplayData --}}
                    </div>
                </div>
            </div>

            <!-- Sign dialog -->
            {{-- Start Dialog --}}
                <div id="show_sign_dialog_content">
                    <div class="relative bg-gray-100 rounded-md">
                        <VueSignaturePad
                            ref="signature"
                            :maxWidth="2"
                            :minWidth="2"
                        />

                        <div class="absolute flex flex-col space-y-2 top-3 right-4">
                            {{-- Start Button --}}
                                <i class="fa fa-undo"></i>
                            {{-- End Button --}}
                            {{-- Start Button --}}
                                <i class="fa fa-eraser"></i>
                            {{-- End Button --}}
                        </div>
                    </div>
                    <div class="flex items-center mt-2">
                        <Checkbox binary />
                        <span class="ml-2 dark:text-surface-200">{{ __('contract.accept_sign_terms') }}</span>
                    </div>
                </div>

                {{-- Vue slot removed --}}
                    <div class="flex justify-end gap-2">
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                        {{-- Button (self-closing) --}}
                    </div>
                {{-- End Vue slot --}}
            {{-- End Dialog --}}
        
    </div>

</x-filament-panels::page>
