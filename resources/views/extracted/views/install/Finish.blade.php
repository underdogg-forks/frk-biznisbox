{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<div class="container w-full md:w-1/2 mx-auto p-6">
        <div class="card">
            <h1 class="text-2xl font-bold text-center">{{ $t('install.finish_installation') }}</h1>

            <p class="text-center">{{ $t('install.finish_installation_description') }}</p>

            <div class="flex justify-center mt-6">
                <Button @click="$router.push({ name: 'auth-login' })" :label="$t('install.go_to_login')" icon="fas fa-sign-in-alt" />
            </div>
        </div>
    </div>