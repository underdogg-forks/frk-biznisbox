{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="admin">
        <PageHeader :title="$t('admin.currency.title')">
            <template #actions>
                <Button :label="$t('admin.currency.new_currency')" icon="fa fa-plus" @click="openNewCurrencyDialog" />
                <Button
                    v-if="$settings.default_currency === 'EUR'"
                    :label="$t('admin.currency.update_rates')"
                    icon="fa fa-sync"
                    @click="updateRates"
                    severity="secondary"
                    outlined
                />