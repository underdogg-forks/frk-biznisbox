<x-filament-panels::page>
{{--
    Converted from Vue: Integrations.vue
    
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
                <Tabs value="online_payments">
                    <TabList>
                        <Tab value="online_payments">{{ __('admin.integrations.online_payments') }}</Tab>
                        <Tab value="open_banking">{{ __('admin.integrations.open_banking') }}</Tab>
                        <Tab value="document_signing">{{ __('admin.integrations.document_signing') }}</Tab>
                    </TabList>

                    <TabPanels>
                        <!-- Online Payments -->
                        {{-- Start TabPanel --}}
                            <div id="stripe_integration">
                                <h2 class="mb-4 font-bold dark:text-surface-200">{{ __('admin.integrations.stripe') }}</h2>
                                <div class="flex flex-col gap-2 mb-2">
                                    <label class="dark:text-surface-200">{{ __('admin.integrations.stripe_available') }} </label>
                                    <ToggleSwitch id="stripe_available" />
                                </div>
                                <PasswordInput
                                    id="stripe_api_key"
                                />

                                {{-- SelectInput (self-closing) --}}
                            </div>

                            <div id="paypal_integration">
                                <h2 class="mb-4 font-bold dark:text-surface-200">{{ __('admin.integrations.paypal') }}</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div class="flex flex-col gap-2 mb-2">
                                        <label class="dark:text-surface-200">{{ __('admin.integrations.paypal_available') }} </label>
                                        <ToggleSwitch />
                                    </div>

                                    <div class="flex flex-col gap-2 mb-2">
                                        <label class="dark:text-surface-200">{{ __('admin.integrations.paypal_test_mode') }} </label>
                                        <ToggleSwitch />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    {{-- TextInput (self-closing) --}}

                                    <PasswordInput
                                        id="paypal_client_secret"
                                    />
                                </div>
                                {{-- SelectInput (self-closing) --}}
                            </div>
                            <!-- Coinbase -->
                            <div id="coinbase_integration" class="mt-6">
                                <h2 class="mb-4 font-bold dark:text-surface-200">{{ __('admin.integrations.coinbase') }}</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div class="flex flex-col gap-2 mb-2">
                                        <label for="coinbase_available" class="dark:text-surface-200"
                                            >{{ __('admin.integrations.coinbase_available') }}
                                        </label>
                                        <ToggleSwitch id="coinbase_available" />
                                    </div>
                                </div>

                                {{-- TextInput (self-closing) --}}

                                {{-- SelectInput (self-closing) --}}
                            </div>
                        {{-- End TabPanel --}}

                        <!-- Open Banking -->
                        {{-- Start TabPanel --}}
                            <div id="open_banking_integration">
                                <h2 class="font-bold mb-4 dark:text-surface-200">{{ __('admin.integrations.open_banking') }}</h2>
                                <div class="flex flex-col gap-2 mb-2">
                                    <label class="dark:text-surface-200">
                                        {{ __('admin.integrations.open_banking_available') }}
                                    </label>
                                    <ToggleSwitch />
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    {{-- TextInput (self-closing) --}}

                                    <PasswordInput
                                        id="open_banking_client_secret"
                                    />
                                </div>
                            </div>
                        {{-- End TabPanel --}}

                        <!-- Document Signing -->
                        {{-- Start TabPanel --}}
                            <div id="document_signing_integration">
                                <h2 class="font-bold mb-4 dark:text-surface-200">{{ __('admin.integrations.document_signing') }}</h2>
                                <div class="flex flex-col gap-2 mb-2">
                                    <label class="dark:text-surface-200">
                                        {{ __('admin.integrations.document_signing_available') }}
                                    </label>
                                    <ToggleSwitch />
                                </div>
                            </div>
                        {{-- End TabPanel --}}
                    </TabPanels>
                </Tabs>
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>
        
    

</x-filament-panels::page>
