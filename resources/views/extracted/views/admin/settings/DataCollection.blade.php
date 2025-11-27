{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('admin.data_collection.title')">
                <template #actions>
                    <Button
                        id="add_category_button"
                        icon="fa fa-plus"
                        :label="$t('basic.add')"
                        @click="openNewEditCategoryDialog('create')"
                    />