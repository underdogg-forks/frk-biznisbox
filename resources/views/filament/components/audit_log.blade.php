{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DataTable Filament equivalent --}}
        <template #empty>
            <div class="p-4 pl-0 text-center w-full">
                <i class="fa fa-info-circle empty-icon"></i>
                <p>{{ __("audit_log.no_audit_logs") }}</p>
            </div>