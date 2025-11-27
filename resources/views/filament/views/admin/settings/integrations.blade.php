{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Convert PageHeader to Filament equivalent --}}

            <div class="card">
                {{-- TODO: Start component Filament equivalent --}}
                    {{-- TODO: Start component Filament equivalent --}}
                        {{-- TODO: Start component Filament equivalent --}}{{ __("admin.integrations.online_payments") }}</Tab>
                        {{-- TODO: Start component Filament equivalent --}}{{ __("admin.integrations.open_banking") }}</Tab>
                        {{-- TODO: Start component Filament equivalent --}}{{ __("admin.integrations.document_signing") }}</Tab>
                    </TabList>

                    {{-- TODO: Start component Filament equivalent --}}
                        <!-- Online Payments -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <div id="stripe_integration">
                                <h2 class="mb-4 font-bold dark:text-surface-200">{{ __("admin.integrations.stripe") }}</h2>
                                <div class="flex flex-col gap-2 mb-2">
                                    <label class="dark:text-surface-200">{{ __("admin.integrations.stripe_available") }} </label>
                                    {{-- TODO: Convert component to Filament equivalent --}}
                                </div>
                                {{-- TODO: Convert PasswordInput to Filament equivalent --}}

                                {{-- TODO: Convert SelectInput to Filament equivalent --}}
                            </div>

                            <div id="paypal_integration">
                                <h2 class="mb-4 font-bold dark:text-surface-200">{{ __("admin.integrations.paypal") }}</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div class="flex flex-col gap-2 mb-2">
                                        <label class="dark:text-surface-200">{{ __("admin.integrations.paypal_available") }} </label>
                                        {{-- TODO: Convert component to Filament equivalent --}}
                                    </div>

                                    <div class="flex flex-col gap-2 mb-2">
                                        <label class="dark:text-surface-200">{{ __("admin.integrations.paypal_test_mode") }} </label>
                                        {{-- TODO: Convert component to Filament equivalent --}}
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    {{-- TODO: Convert TextInput to Filament equivalent --}}

                                    {{-- TODO: Convert PasswordInput to Filament equivalent --}}
                                </div>
                                {{-- TODO: Convert SelectInput to Filament equivalent --}}
                            </div>
                            <!-- Coinbase -->
                            <div id="coinbase_integration" class="mt-6">
                                <h2 class="mb-4 font-bold dark:text-surface-200">{{ __("admin.integrations.coinbase") }}</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div class="flex flex-col gap-2 mb-2">
                                        <label for="coinbase_available" class="dark:text-surface-200"
                                            >{{ __("admin.integrations.coinbase_available") }}
                                        </label>
                                        {{-- TODO: Convert component to Filament equivalent --}}
                                    </div>
                                </div>

                                {{-- TODO: Convert TextInput to Filament equivalent --}}

                                {{-- TODO: Convert SelectInput to Filament equivalent --}}
                            </div>
                        {{-- TODO: End TabPanel --}}

                        <!-- Open Banking -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <div id="open_banking_integration">
                                <h2 class="font-bold mb-4 dark:text-surface-200">{{ __("admin.integrations.open_banking") }}</h2>
                                <div class="flex flex-col gap-2 mb-2">
                                    <label class="dark:text-surface-200">
                                        {{ __("admin.integrations.open_banking_available") }}
                                    </label>
                                    {{-- TODO: Convert component to Filament equivalent --}}
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    {{-- TODO: Convert TextInput to Filament equivalent --}}

                                    {{-- TODO: Convert PasswordInput to Filament equivalent --}}
                                </div>
                            </div>
                        {{-- TODO: End TabPanel --}}

                        <!-- Document Signing -->
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            <div id="document_signing_integration">
                                <h2 class="font-bold mb-4 dark:text-surface-200">{{ __("admin.integrations.document_signing") }}</h2>
                                <div class="flex flex-col gap-2 mb-2">
                                    <label class="dark:text-surface-200">
                                        {{ __("admin.integrations.document_signing_available") }}
                                    </label>
                                    {{-- TODO: Convert component to Filament equivalent --}}
                                </div>
                            </div>
                        {{-- TODO: End TabPanel --}}
                    </TabPanels>
                </Tabs>
            </div>

            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- TODO: Convert Button to Filament equivalent --}}
            </div>
        {{-- TODO: End LoadingScreen --}}
    {{-- TODO: End DefaultLayout --}}