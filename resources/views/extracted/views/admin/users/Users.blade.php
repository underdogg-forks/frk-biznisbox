{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <PageHeader :title="$t('admin.user.user', 2)">
            <template #actions>
                <Button :label="$t('admin.user.new_user')" icon="fa fa-plus" @click="$router.push({ name: 'admin-user-create' })" />