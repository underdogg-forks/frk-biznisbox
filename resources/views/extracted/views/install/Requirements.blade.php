{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="container w-full md:w-1/2 mx-auto p-6">
        <div class="card">
            <h1 class="text-2xl font-bold text-center">{{ $t('install.welcome_message') }}</h1>

            <p class="text-center">{{ $t('install.requirements_message') }}</p>

            <div class="mt-6">
                <SelectInput v-model="language" :label="$t('form.language')" :options="locales" optionLabel="label" optionValue="value" />

                <LoadingScreen :blocked="loadingData">
                    <ul>
                        <li v-for="requirement in requirements" :key="requirement.name">
                            <span v-if="requirement.status" class="text-green-500">&#10003;</span>
                            <span v-else class="text-red-500">&#10005;</span>
                            {{ $t(`install.requirements.${requirement.name}`) }}
                        </li>
                    </ul>
                </LoadingScreen>
            </div>

            <div class="mt-6">
                <p v-if="allRequirementsMet" class="text-green-500">{{ $t('install.all_requirements_met') }}</p>
                <p v-else class="text-red-500">{{ $t('install.not_all_requirements_met') }}</p>
            </div>

            <div class="flex justify-end mt-6">
                <Button @click="nextStep" :disabled="!allRequirementsMet" :label="$t('basic.next')" icon="fas fa-arrow-right" />
            </div>
        </div>
    </div>