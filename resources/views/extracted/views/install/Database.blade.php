{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="container w-full md:w-1/2 mx-auto p-6">
        <div class="card">
            <h1 class="text-2xl font-bold text-center">{{ $t('install.database_configuration') }}</h1>

            <p class="text-center">{{ $t('install.database_configuration_description') }}</p>

            <SelectInput
                :label="$t('install.database_driver')"
                v-model="database.driver"
                :options="[
                    { label: 'MySQL', value: 'mysql' },
                    { label: 'PostgreSQL', value: 'pgsql' },
                    { label: 'SQL Server', value: 'sqlsrv' },
                ]"
            />

            <TextInput :label="$t('install.database_host')" v-model="database.host" v-if="database.type != 'sqlite'" />
            <TextInput :label="$t('install.database_port')" v-model="database.port" v-if="database.type != 'sqlite'" />
            <TextInput :label="$t('install.database_name')" v-model="database.database" v-if="database.type != 'sqlite'" />
            <TextInput :label="$t('install.database_username')" v-model="database.username" v-if="database.type != 'sqlite'" />
            <TextInput :label="$t('install.database_password')" v-model="database.password" v-if="database.type != 'sqlite'" />
            <TextInput :label="$t('install.database_path')" v-model="database.path" v-if="database.type == 'sqlite'" />

            <div class="mb-6">
                <div v-if="checked" class="mt-6">
                    <p class="text-green-500 font-bold">{{ $t('install.connection_successful') }}</p>
                </div>

                <div v-if="error" class="mt-6">
                    <p class="text-red-500 font-bold">{{ error }}</p>
                </div>
            </div>
            <div class="flex justify-between gap-4 mt-6">
                <Button @click="prevStep" :label="$t('basic.back')" icon="fas fa-arrow-left" />
                <Button @click="checkConnection" :label="$t('install.check_connection')" icon="fas fa-check" severity="success" />
                <Button @click="nextStep" :label="$t('basic.next')" icon="fas fa-arrow-right" :disabled="!checked" />
            </div>
        </div>
    </div>