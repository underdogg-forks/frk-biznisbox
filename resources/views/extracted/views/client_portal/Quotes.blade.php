{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="client">
        <PageHeader :title="$t('quote.quote', 3)" />

        <div id="quote_table" class="card">
            <DataTable
                :value="quotes"
                :loading="loadingData"
                paginator
                dataKey="id"
                :rows="10"
                :rowsPerPageOptions="[5, 10, 20, 50, 100]"
                @row-dblclick="viewQuoteNavigationClientPortal"
            >
                <template #empty>
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ $t('quote.no_quotes') }}</p>
                    </div>