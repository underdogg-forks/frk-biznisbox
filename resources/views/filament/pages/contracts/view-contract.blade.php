<x-filament-panels::page>
{{--
    Converted from Vue: ViewContract.vue
    
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
                        <span class="p-2">{{ __('contract.no_signers') }}</span>
                    </ul>
                {{-- End DisplayData --}}
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        

        <!-- Shared dialog -->
        {{-- Start Dialog --}}
            <div id="share_dialog_content">
                <div class="text-center">{{ __('contract.share_dialog_text') }}</div>

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

        <!--Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
