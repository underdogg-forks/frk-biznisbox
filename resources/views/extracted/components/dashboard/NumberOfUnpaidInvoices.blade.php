{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DashboardCardWithIcon
        v-if="hasPermission('invoices')"
        :iconClass="'fas fa-file-invoice'"
        :dashboardTitle="$t('dashboard.number_of_unpaid_invoices')"
        :dashboardData="totalUnpaidInvoices"
    />