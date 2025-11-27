{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('transaction.transaction', 2)">
            <template #actions>
                <Button :label="$t('transaction.new_transaction')" icon="fa fa-plus" @click="$router.push('/transactions/create')" />
                <Button
                    id="categories_button"
                    icon="fa fa-folder-tree"
                    :label="$t('transaction.categories')"
                    @click="showCategoriesDialog = true"
                />