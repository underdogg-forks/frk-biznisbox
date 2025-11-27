{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <PageHeader :title="$t('admin.department.title')">
            <template #actions>
                <Button
                    icon="fa fa-plus"
                    @click="$router.push({ name: 'admin-department-create' })"
                    :label="$t('admin.department.new_department')"
                />