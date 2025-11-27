{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DataTable
        :value="auditLogs"
        paginator
        dataKey="id"
        :rows="20"
        :rowsPerPageOptions="[5, 10, 20, 50, 100]"
        :loading="loadingData"
        filter-display="menu"
        size="small"
        v-model:expandedRows="expandedRows"
    >
        <template #empty>
            <div class="p-4 pl-0 text-center w-full">
                <i class="fa fa-info-circle empty-icon"></i>
                <p>{{ $t('audit_log.no_audit_logs') }}</p>
            </div>