{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('invoice.invoice', 3)">
            <template #actions>
                <Button :label="$t('invoice.new_invoice')" icon="fa fa-plus" @click="$router.push('/invoices/create')" />