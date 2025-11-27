{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Convert PageHeader to Filament equivalent --}}

        <!-- Dashboard Cards -->
        <div class="grid md:grid-cols-2 grid-cols-1 gap-4 mb-4">
            <DashboardCardWithIcon
                :dashboard-data="dashboardData.contracts_count"
                :dashboard-title="__("client_portal.number_of_contracts")"
                icon-class="fa fa-file-alt"
            />
            <DashboardCardWithIcon
                :dashboard-data="dashboardData.unpaid_invoices"
                :dashboard-title="__("client_portal.number_of_unpaid_invoices")"
                icon-class="fa fa-file-invoice-dollar"
            />
            <DashboardCardWithIcon
                :dashboard-data="dashboardData.number_of_support_tickets"
                :dashboard-title="__("client_portal.number_of_support_tickets")"
                icon-class="fa fa-headset"
            />
            <DashboardCardWithIcon
                :dashboard-data="dashboardData.number_of_bills"
                :dashboard-title="__("client_portal.number_of_bills")"
                icon-class="fa fa-file-invoice"
            />
            <DashboardCardWithIcon
                :dashboard-data="dashboardData.number_of_quotes"
                :dashboard-title="__("client_portal.number_of_quotes")"
                icon-class="fa fa-file-alt"
            />
        </div>
    {{-- TODO: End DefaultLayout --}}