{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="role.display_name">
                <template #actions>
                    <Button
                        v-if="!role.system"
                        :label="$t('basic.delete')"
                        icon="fa fa-trash"
                        severity="danger"
                        @click="deleteRoleAsk($route.params.id)"
                    />
                    <Button
                        v-if="!role.system"
                        :label="$t('basic.edit')"
                        icon="fa fa-pencil"
                        @click="$router.push({ name: 'admin-role-edit', params: { id: $route.params.id } })"
                        severity="success"
                    />
                    <Button :label="$t('audit_log.audit_log')" icon="fa fa-history" @click="showAuditLogDialog = true" />