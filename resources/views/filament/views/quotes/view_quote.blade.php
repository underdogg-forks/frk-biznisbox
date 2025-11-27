{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Start PageHeader Filament equivalent --}}
                <template #actions>
                    {{-- TODO: Start Button Filament equivalent --}}
                    {{-- TODO: Convert Button to Filament equivalent --}}
                    {{-- TODO: Convert Button to Filament equivalent --}}
                    {{-- TODO: Start SplitButton Filament equivalent --}} sendQuoteNotification(quote.id) },
                            { label: __("basic.download"), icon: 'fa fa-download', command: () => downloadQuote() },
                            { label: __("basic.show_pdf"), icon: 'fa fa-file-pdf', command: () => viewQuotePdf() },
                            { label: __("audit_log.audit_log"), icon: 'fa fa-history', command: () => (showAuditLogDialog = true) },
                        ]"
                    />