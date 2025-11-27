{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <PageHeader :title="$t('quote.quote', 3)">
            <template v-slot:actions>
                <Button :label="$t('quote.new_quote')" icon="fa fa-plus" @click="$router.push('/quotes/create')" />