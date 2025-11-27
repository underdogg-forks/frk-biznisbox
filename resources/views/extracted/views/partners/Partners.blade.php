{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('partner.partner', 3)">
            <template v-slot:actions>
                <Button :label="$t('partner.new_partner')" icon="fa fa-plus" @click="$router.push({ name: 'partner-create' })" />