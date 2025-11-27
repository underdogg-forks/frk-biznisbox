{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('bill.bill', 2)">
            <template #actions>
                <Button :label="$t('bill.new_bill')" icon="fa fa-plus" @click="$router.push({ name: 'bill-create' })" />