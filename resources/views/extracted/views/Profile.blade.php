{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout :menu_type="user_role_menu">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('profile.profile')" />
            <div class="card">
                <div id="user_profile_upload" class="flex mb-2">
                    <Avatar
                        :image="user_data.avatar_url"
                        size="xlarge"
                        v-if="user_data.avatar_url"
                        @contextmenu.prevent="removeAvatar"
                        class="user-avatar"
                    />
                    <FileUpload
                        name="picture"
                        url="/api/profile/avatar"
                        auto
                        accept="image/*"
                        @before-send="beforeUploadAvatar"
                        @upload="getProfile"
                        mode="basic"
                        class="flex items-center justify-center"
                        :class="user_data.avatar_url ? 'ml-4' : 'ml-0'"
                        :disabled="loadingData"
                    />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <TextInput
                            id="input_first_name"
                            v-model="v$.user_data.first_name.$model"
                            :label="$t('form.first_name')"
                            :placeholder="$t('form.first_name')"
                            :disabled="loadingData"
                            :validate="v$.user_data.first_name"
                        />
                    </div>

                    <div>
                        <TextInput
                            id="input_last_name"
                            v-model="v$.user_data.last_name.$model"
                            :label="$t('form.last_name')"
                            :placeholder="$t('form.last_name')"
                            :disabled="loadingData"
                            :validate="v$.user_data.last_name"
                        />
                    </div>
                </div>

                <TextInput
                    id="input_email"
                    v-model="v$.user_data.email.$model"
                    :label="$t('form.email')"
                    :placeholder="$t('form.email')"
                    disabled
                    :validate="v$.user_data.email"
                />

                <SelectInput
                    id="input_language"
                    v-model="v$.user_data.language.$model"
                    :label="$t('form.language')"
                    :options="locales"
                    :disabled="loadingData"
                    option-label="locale"
                    option-value="code"
                    :validate="v$.user_data.language"
                />
            </div>
            <div id="user_profile_buttons" class="flex justify-end mt-4 gap-2">
                <Button
                    id="update_button"
                    :label="$t('basic.update')"
                    :disabled="loadingData"
                    icon="fa fa-floppy-disk"
                    severity="success"
                    @click="saveUser"
                />
            </div>

            <div class="card mt-3">
                <Tabs value="login_history">
                    <TabList>
                        <Tab value="login_history"> {{ $t('login_history.login_history') }} </Tab>
                        <Tab value="change_password"> {{ $t('profile.change_password') }} </Tab>
                        <Tab value="two_factor_authentication"> {{ $t('profile.two_factor_authentication') }} </Tab>
                        <Tab value="personal_access_tokens"> {{ $t('profile.personal_access_tokens') }} </Tab>
                    </TabList>

                    <TabPanels>
                        <TabPanel value="login_history">
                            <DataTable
                                :value="user_data.sessions"
                                paginator
                                :rows="10"
                                :rows-per-page-options="[10, 20, 50]"
                                v-model:expandedRows="expandedRows"
                            >
                                <template #empty>
                                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                                        <i class="fa fa-info-circle empty-icon"></i>
                                        <p>{{ $t('login_history.no_login_history') }}</p>
                                    </div>