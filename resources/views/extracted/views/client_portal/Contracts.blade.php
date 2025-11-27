{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="client">
        <PageHeader :title="$t('contract.contract', 3)" />

        <div id="contracts_table" class="card">
            <DataTable
                :value="contracts"
                :loading="loadingData"
                paginator
                dataKey="id"
                :rows="10"
                :rowsPerPageOptions="[5, 10, 20, 50, 100]"
                filter-display="menu"
                @row-dblclick="viewContractNavigation"
            >
                <template #empty>
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ $t('contract.no_contracts') }}</p>
                    </div>