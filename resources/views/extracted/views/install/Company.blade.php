{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="container w-full md:w-1/2 mx-auto p-6">
        <div class="card">
            <h1 class="text-2xl font-bold text-center">{{ $t('install.company_welcome') }}</h1>

            <p class="text-center">{{ $t('install.company_welcome_description') }}</p>

            <TextInput
                v-model="v$.company.company_name.$model"
                :label="$t('admin.company.company_name')"
                :validate="v$.company.company_name"
            />
            <TextInput
                v-model="v$.company.company_address.$model"
                :label="$t('admin.company.company_address')"
                :validate="v$.company.company_address"
            />
            <TextInput
                v-model="v$.company.company_zip.$model"
                :label="$t('admin.company.company_zip')"
                :validate="v$.company.company_zip"
            />
            <TextInput
                v-model="v$.company.company_city.$model"
                :label="$t('admin.company.company_city')"
                :validate="v$.company.company_city"
            />
            <CountrySelect
                v-model="v$.company.company_country.$model"
                :label="$t('admin.company.company_country')"
                :validate="v$.company.company_country"
            />
            <TextInput
                v-model="v$.company.company_phone.$model"
                :label="$t('admin.company.company_phone')"
                :validate="v$.company.company_phone"
            />
            <TextInput
                v-model="v$.company.company_email.$model"
                :label="$t('admin.company.company_email')"
                :validate="v$.company.company_email"
            />

            <div class="flex justify-end mt-6">
                <Button @click="nextStep" :label="$t('basic.next')" icon="fas fa-arrow-right" />
            </div>
        </div>
    </div>