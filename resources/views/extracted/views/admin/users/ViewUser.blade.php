{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="user.first_name + ' ' + user.last_name">
                <template #actions>
                    <Button
                        icon="fa fa-pencil"
                        :label="$t('basic.edit')"
                        severity="success"
                        @click="$router.push({ name: 'admin-user-edit', params: { id: $route.params.id } })"
                    />
                    <Button icon="fa fa-trash" :label="$t('basic.delete')" severity="danger" @click="deleteUserAsk($route.params.id)" />
                    <Button icon="fa fa-lock" :label="$t('admin.user.reset_password')" @click="showPasswordDialog = true" />
                    <Button icon="fa fa-history" :label="$t('audit_log.audit_log')" @click="showAuditLogDialog = true" />
                    <Button
                        v-if="user.two_factor_auth"
                        icon="fa fa-key"
                        :label="$t('admin.user.disable_2fa')"
                        @click="disable2fa($route.params.id)"
                    />