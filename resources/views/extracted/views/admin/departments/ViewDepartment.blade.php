{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('admin.department.view_department')">
                <template #actions>
                    <Button
                        id="edit_button"
                        :label="$t('basic.edit')"
                        severity="success"
                        icon="fa fa-edit"
                        @click="$router.push({ name: 'admin-department-edit', params: { id: $route.params.id } })"
                    />
                    <Button
                        id="delete_button"
                        :label="$t('basic.delete')"
                        icon="fa fa-trash"
                        severity="danger"
                        @click="deleteDepartmentAsk($route.params.id)"
                    />
                    <Button
                        id="audit_log_button"
                        :label="$t('audit_log.audit_log')"
                        icon="fa fa-history"
                        severity="info"
                        @click="showAuditLogDialog = true"
                    />