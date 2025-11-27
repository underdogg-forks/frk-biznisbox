{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <PageHeader :title="$t('admin.dashboard.title')">
            <template v-slot:actions>
                <Button v-if="!editDashboard" @click="editDashboard = true" icon="fa fa-edit" text />
                <Button
                    v-if="editDashboard"
                    @click="editDashboard = false"
                    icon="fa fa-save"
                    :label="$t('basic.save')"
                    severity="success"
                />
                <Button
                    v-if="editDashboard"
                    @click="addElementDialog = true"
                    icon="fa fa-plus"
                    :label="$t('dashboard.add_element')"
                    severity="secondary"
                />
                <Button
                    v-if="editDashboard"
                    @click="removeElementDialog = true"
                    icon="fa fa-trash"
                    :label="$t('dashboard.remove_element')"
                    severity="danger"
                />