<x-filament-panels::page>
{{--
    Converted from Vue: Profile.vue
    
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
                <div id="user_profile_upload" class="flex mb-2">
                    {{-- Avatar (self-closing) --}}
                    {{-- FileUpload (self-closing) --}}
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        {{-- TextInput (self-closing) --}}
                    </div>

                    <div>
                        {{-- TextInput (self-closing) --}}
                    </div>
                </div>

                {{-- TextInput (self-closing) --}}

                {{-- SelectInput (self-closing) --}}
            </div>
            <div id="user_profile_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>

            <div class="card mt-3">
                <Tabs value="login_history">
                    <TabList>
                        <Tab value="login_history"> {{ __('login_history.login_history') }} </Tab>
                        <Tab value="change_password"> {{ __('profile.change_password') }} </Tab>
                        <Tab value="two_factor_authentication"> {{ __('profile.two_factor_authentication') }} </Tab>
                        <Tab value="personal_access_tokens"> {{ __('profile.personal_access_tokens') }} </Tab>
                    </TabList>

                    <TabPanels>
                        {{-- Start TabPanel --}}
                            {{-- Start DataTable --}}
                                {{-- Vue slot removed --}}
                                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                        <i class="fa fa-info-circle empty-icon"></i>
                                        <p>{{ __('login_history.no_login_history') }}</p>
                                    </div>
                                {{-- End Vue slot --}}

                                {{-- Column (self-closing) --}}
                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        {{-- Tag (self-closing) --}}
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}
                                {{-- Column (self-closing) --}}
                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        <span>
                                            <i class="fa fa-desktop text-blue-500"></i>
                                        </span>

                                        <span>
                                            <i class="fa fa-mobile text-blue-500"></i>
                                        </span>

                                        <span>
                                            <i class="fa fa-tablet text-blue-500"></i>
                                        </span>
                                        <span>
                                            <i class="fa fa-robot text-slate-500"></i>
                                        </span>
                                        {{-- Tag (self-closing) --}}
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}
                                {{-- Column (self-closing) --}}
                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        <div>
                                            <div>{{ data.location }}</div>
                                            <div>{{ formatCountry(data.country) }}</div>
                                        </div>
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}

                                {{-- Vue slot removed --}}
                                    {{-- Start DisplayData --}}
                                        {{-- Start Tag --}}{{ data.browser }}{{-- End Tag --}}
                                    {{-- End DisplayData --}}

                                    {{-- Start DisplayData --}}
                                        <VMap style="height: 200px">
                                            <VMapOsmTileLayer />
                                            <VMapZoomControl />
                                            <VMapMarker />
                                            <VMapAttributionControl />
                                        </VMap>
                                    {{-- End DisplayData --}}
                                {{-- End Vue slot --}}
                            {{-- End DataTable --}}
                        {{-- End TabPanel --}}

                        {{-- Start TabPanel --}}
                            <form id="user_profile_password_form">
                                <PasswordInput
                                    id="input_current_password"
                                />
                                <PasswordInput
                                    id="input_password"
                                />
                                <PasswordInput
                                    id="input_confirm_password"
                                />
                                <div id="user_profile_password_buttons" class="flex gap-2 justify-end">
                                    {{-- Button (self-closing) --}}
                                </div>
                            </form>
                        {{-- End TabPanel --}}

                        {{-- Start TabPanel --}}
                            <div class="flex gap-2 justify-center mt-5">
                                {{-- Button (self-closing) --}}

                                {{-- Button (self-closing) --}}
                            </div>

                            <div>
                                <div class="mt-3">
                                    <p>{{ __('profile.scan_qr_code') }}</p>
                                    <p>
                                        {{ __('profile.two_factor_authentication_secret') }}: <strong>{{ two_factor.secret }}</strong>
                                    </p>
                                    <p>{{ __('profile.two_factor_authentication_qr_code') }}:</p>

                                    <div class="flex justify-center my-2">
                                        <QrcodeVue />
                                    </div>

                                    <div class="flex justify-center mt-3">
                                        <OtpInput
                                            id="input_2fa_code"
                                        />
                                    </div>

                                    <div id="user_profile_2fa_buttons" class="flex gap-2 justify-center mt-3">
                                        {{-- Button (self-closing) --}}
                                    </div>
                                </div>
                            </div>
                        {{-- End TabPanel --}}

                        <!-- Personal Access Tokens -->
                        {{-- Start TabPanel --}}
                            <div class="flex gap-2 justify-end my-2">
                                {{-- Button (self-closing) --}}
                            </div>

                            {{-- Start DataTable --}}
                                {{-- Vue slot removed --}}
                                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                        <i class="fa fa-info -circle empty-icon"></i>
                                        <p>{{ __('profile.no_personal_access_tokens') }}</p>
                                    </div>
                                {{-- End Vue slot --}}

                                {{-- Column (self-closing) --}}
                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        {{-- Tag (self-closing) --}}
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}
                                {{-- Start Column --}}
                                    {{-- Vue slot removed --}}
                                        <div class="flex gap-2">
                                            {{-- Button (self-closing) --}}
                                        </div>
                                    {{-- End Vue slot --}}
                                {{-- End Column --}}
                            {{-- End DataTable --}}
                        {{-- End TabPanel --}}
                    </TabPanels>
                </Tabs>
            </div>
        

        <!-- Personal Access Token Modal -->
        {{-- Start Dialog --}}
            <form id="personal_access_token_form">
                {{-- TextInput (self-closing) --}}
                {{-- SelectInput (self-closing) --}}
                <div id="personal_access_token_buttons" class="flex gap-2 justify-end">
                    {{-- Button (self-closing) --}}
                </div>
            </form>
        {{-- End Dialog --}}

        <!-- Generated Personal Access Token Modal -->
        {{-- Start Dialog --}}
            <div class="p-4 dark:text-surface-200">
                <p>{{ __('profile.generated_personal_access_token_message') }}</p>
                <div class="mt-3">
                    <span class="flex justify-center my-2 break-all border border-gray-300 p-2 rounded">
                        {{ generatedPersonalAccessToken }}
                    </span>
                </div>
            </div>
        {{-- End Dialog --}}
    

</x-filament-panels::page>
