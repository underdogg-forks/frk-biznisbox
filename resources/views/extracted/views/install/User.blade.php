{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="container w-full md:w-1/2 mx-auto p-6">
        <div class="card">
            <h1 class="text-2xl font-bold text-center">{{ $t('install.create_user') }}</h1>

            <p class="text-center">{{ $t('install.create_user_description') }}</p>

            <div class="mt-6">
                <TextInput v-model="v$.user.first_name.$model" :label="$t('form.first_name')" :validate="v$.user.first_name" />
                <TextInput v-model="v$.user.last_name.$model" :label="$t('form.last_name')" :validate="v$.user.last_name" />
                <TextInput v-model="v$.user.email.$model" :label="$t('form.email')" :validate="v$.user.email" />
                <PasswordInput v-model="v$.user.password.$model" :label="$t('form.password')" :validate="v$.user.password" />

                <div class="flex justify-end mt-6">
                    <Button @click="nextStep" :label="$t('basic.next')" icon="fas fa-arrow-right" />
                </div>
            </div>
        </div>
    </div>