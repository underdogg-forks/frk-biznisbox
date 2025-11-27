{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="account.name">
                <template #actions>
                    <Button :label="$t('basic.edit')" icon="fa fa-edit" severity="success" @click="editAccountNavigation" />
                    <Button :label="$t('basic.delete')" icon="fa fa-trash" severity="danger" @click="deleteAccountAsk($route.params.id)" />
                    <Button :label="$t('audit_log.audit_log')" icon="fa fa-history" severity="info" @click="showAuditLogDialog = true" />