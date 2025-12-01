<x-filament-panels::page>
{{--
    Converted from Vue: ViewUser.vue
    
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

            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div class="col-span-1 md:col-span-4 card">
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- Start DisplayData --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End DisplayData --}}
                    {{-- DisplayData (self-closing) --}}
                    {{-- Start DisplayData --}}
                        <span>
                            {{ formatDateTime(user.last_login_at) }}
                        </span>
                        <span>
                            {{-- Tag (self-closing) --}}
                        </span>
                    {{-- End DisplayData --}}
                    {{-- Start DisplayData --}}
                        <div>
                            {{-- Tag (self-closing) --}}
                        </div>
                        <div>
                            {{-- Tag (self-closing) --}}
                        </div>
                    {{-- End DisplayData --}}

                    {{-- Start DisplayData --}}
                        {{-- Tag (self-closing) --}}
                        {{-- Tag (self-closing) --}}
                    {{-- End DisplayData --}}
                </div>

                <div class="col-span-1 md:col-span-8 card">
                    <Tabs value="sessions_tab">
                        <TabList>
                            <Tab value="sessions_tab">{{ __('login_history.login_history') }}</Tab>
                            <Tab value="personal_access_tokens_tab">{{ __('admin.user.personal_access_tokens') }}</Tab>
                        </TabList>
                        <TabPanels>
                            <!-- Login history tab -->
                            {{-- Start TabPanel --}}
                                {{-- Start DataTable --}}
                                    {{-- Vue slot removed --}}
                                        <div class="p-4 pl-0 text-center w-full dark:text-surface-200">
                                            <i class="fa fa-info-circle empty-icon"></i>
                                            <p>{{ __('login_history.no_login_history') }}</p>
                                        </div>
                                    {{-- End Vue slot --}}

                                    {{-- Start Column --}}
                                        {{-- Vue slot removed --}}
                                            {{ formatDateTime(data.created_at) }}
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
                                {{-- End DataTable --}}
                            {{-- End TabPanel --}}

                            <!--Personal access tokens tab -->
                            {{-- Start TabPanel --}}
                                {{-- Start DataTable --}}
                                    {{-- Vue slot removed --}}
                                        <div class="p-4 pl-0 text-center w-full dark:text-surface-200">
                                            <i class="fa fa-info -circle empty-icon"></i>
                                            <p>{{ __('admin.user.no_personal_access_tokens') }}</p>
                                        </div>
                                    {{-- End Vue slot --}}
                                    {{-- Column (self-closing) --}}
                                    {{-- Start Column --}}
                                        {{-- Vue slot removed --}}
                                            <span>
                                                {{ formatDateTime(data.last_used_at) }}
                                            </span>
                                            <span>
                                                {{-- Tag (self-closing) --}}
                                            </span>
                                        {{-- End Vue slot --}}
                                    {{-- End Column --}}
                                    {{-- Start Column --}}
                                        {{-- Vue slot removed --}}
                                            {{ formatDateTime(data.created_at) }}
                                        {{-- End Vue slot --}}
                                    {{-- End Column --}}
                                    {{-- Start Column --}}
                                        {{-- Vue slot removed --}}
                                            <span>
                                                {{ formatDateTime(data.valid_until) }}
                                            </span>
                                            <span>
                                                {{-- Tag (self-closing) --}}
                                            </span>
                                        {{-- End Vue slot --}}
                                    {{-- End Column --}}
                                    {{-- Start Column --}}
                                        {{-- Vue slot removed --}}
                                            {{-- Button (self-closing) --}}
                                        {{-- End Vue slot --}}
                                    {{-- End Column --}}
                                {{-- End DataTable --}}
                            {{-- End TabPanel --}}
                        </TabPanels>
                    </Tabs>
                </div>
            </div>
            <div id="function_buttons" class="flex justify-end mt-4 gap-2">
                {{-- Button (self-closing) --}}
            </div>

            <!-- Password Dialog -->
            {{-- Start Dialog --}}
                <form class="flex flex-col gap-4">
                    <div class="flex items-center gap-2">
                        <Checkbox binary />
                        <label>{{ __('admin.user.auto_generate_password') }}</label>
                    </div>

                    {{-- TextInput (self-closing) --}}
                    <div class="flex flex-col gap-2 mb-2">
                        <label for="input_send_details_to" class="dark:text-surface-200">
                            {{ __('admin.user.send_details_to') }}
                        </label>
                        {{-- AutoComplete (self-closing) --}}
                    </div>
                </form>

                {{-- Vue slot removed --}}
                    {{-- Button (self-closing) --}}
                    {{-- Button (self-closing) --}}
                {{-- End Vue slot --}}
            {{-- End Dialog --}}
        

        <!-- Audit log dialog -->
        {{-- Start Dialog --}}
            {{-- AuditLog (self-closing) --}}
        {{-- End Dialog --}}
    

</x-filament-panels::page>
