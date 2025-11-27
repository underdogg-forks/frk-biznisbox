{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('contract.contract', 3)">
            <template #actions>
                <Button :label="$t('contract.create_contract')" icon="fa fa-plus" @click="$router.push('/contracts/create')" />