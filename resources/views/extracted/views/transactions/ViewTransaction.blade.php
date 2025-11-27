{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('transaction.transaction') + ' ' + transaction.number">
                <template #actions>
                    <Button
                        :label="$t('basic.edit')"
                        icon="fa fa-edit"
                        @click="$router.push({ name: 'transaction-edit', params: { id: $route.params.id } })"
                        severity="success"
                    />
                    <Button
                        :label="$t('basic.delete')"
                        icon="fa fa-trash"
                        severity="danger"
                        @click="deleteTransactionAsk($route.params.id)"
                    />
                    <Button :label="$t('audit_log.audit_log')" icon="fa fa-history" severity="info" @click="showAuditLogDialog = true" />