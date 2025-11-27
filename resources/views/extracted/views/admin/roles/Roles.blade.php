{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <PageHeader :title="$t('admin.role.title')">
            <template #actions>
                <Button icon="fa fa-plus" :label="$t('admin.role.new_role')" @click="$router.push({ name: 'admin-role-create' })" />