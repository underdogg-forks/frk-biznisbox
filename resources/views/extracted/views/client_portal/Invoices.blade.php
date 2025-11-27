{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout menu_type="client">
        <PageHeader :title="$t('invoice.invoice', 3)" />

        <div id="invoice_table" class="card">
            <DataTable
                :value="invoices"
                :loading="loadingData"
                paginator
                dataKey="id"
                :rows="10"
                :rowsPerPageOptions="[5, 10, 20, 50, 100]"
                @row-dblclick="viewInvoiceNavigationClientPortal"
            >
                <template #empty>
                    <div class="p-4 pl-0 text-center w-full dark:text-gray-400">
                        <i class="fa fa-info-circle empty-icon"></i>
                        <p>{{ $t('invoice.no_invoices') }}</p>
                    </div>