{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="partner.name">
                <template #actions>
                    <Button :label="$t('basic.edit')" icon="fa fa-pen" @click="editPartnerNavigation" severity="success" />
                    <Button :label="$t('basic.delete')" icon="fa fa-trash" severity="danger" @click="deletePartnerAsk($route.params.id)" />
                    <Button :label="$t('audit_log.audit_log')" icon="fa fa-history" @click="showAuditLogDialog = true" />