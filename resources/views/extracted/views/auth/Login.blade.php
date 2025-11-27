{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div id="auth_login_page">
        <div class="flex justify-center items-center h-screen">
            <div class="p-2 shadow-md border border-surface-300 rounded-md w-full md:w-96 mx-4">
                <LoadingScreen :blocked="loadingData" class="p-1">
                    <img
                        v-if="$settings && $settings['company_logo'] != null"
                        :src="`/storage/${$settings['company_logo']}`"
                        class="w-32 h-32 mx-auto"
                        alt="logo"
                    />

                    <h1 class="text-center text-2xl font-bold mb-4 dark:text-surface-200">
                        {{ $t('auth.login') }}
                    </h1>
                    <form @submit.prevent="login">
                        <TextInput v-model="form.email" :label="$t('auth.email')" autocomplete="username" />
                        <PasswordInput v-model="form.password" :label="$t('auth.password')" />

                        <OtpInput v-model="form.otp" :label="$t('auth.otp')" v-if="otp_required" />
                        <Button
                            @click="login"
                            :label="$t('auth.login')"
                            class="mt-4"
                            type="submit"
                            :disabled="!form.email || !form.password || loadingData"
                        />
                    </form>
                </LoadingScreen>
            </div>
        </div>
    </div>