{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Convert PageHeader to Filament equivalent --}}
            <div class="card">
                <div id="user_profile_upload" class="flex mb-2">
                    <Avatar
                        size="xlarge"
                        @contextmenu.prevent="removeAvatar"
                        class="user-avatar"
                    />
                    {{-- TODO: Start FileUpload Filament equivalent --}}
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                    </div>

                    <div>
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                    </div>
                </div>

                {{-- TODO: Convert TextInput to Filament equivalent --}}

                {{-- TODO: Convert SelectInput to Filament equivalent --}}
            </div>
            <div id="user_profile_buttons" class="flex justify-end mt-4 gap-2">
                {{-- TODO: Convert Button to Filament equivalent --}}
            </div>

            <div class="card mt-3">
                <Tabs value="login_history">
                    <TabList>
                        <Tab value="login_history"> {{ __("login_history.login_history") }} </Tab>
                        <Tab value="change_password"> {{ __("profile.change_password") }} </Tab>
                        <Tab value="two_factor_authentication"> {{ __("profile.two_factor_authentication") }} </Tab>
                        <Tab value="personal_access_tokens"> {{ __("profile.personal_access_tokens") }} </Tab>
                    </TabList>

                    <TabPanels>
                        {{-- TODO: Start TabPanel Filament equivalent --}}
                            {{-- TODO: Start DataTable Filament equivalent --}}
                                <template #empty>
                                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                        <i class="fa fa-info-circle empty-icon"></i>
                                        <p>{{ __("login_history.no_login_history") }}</p>
                                    </div>