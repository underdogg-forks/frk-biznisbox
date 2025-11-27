{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <PageHeader :title="$t('admin.taxes.title')">
            <template #actions>
                <Button :label="$t('admin.taxes.new_tax')" icon="fa fa-plus" @click="openNewTaxDialog" />
                <Button :label="$t('admin.taxes.import_tax')" icon="fa fa-upload" @click="openImportTaxDialog" />