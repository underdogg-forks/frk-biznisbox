{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('account.account', 3)">
            <template #actions>
                <Button :label="$t('account.new_account')" icon="fa fa-plus" @click="$router.push('/accounts/create')" />
                <Button
                    v-if="$settings.open_banking_available"
                    :label="$t('account.connect_bank')"
                    icon="fa fa-university"
                    @click="connectBankDialog = true"
                />