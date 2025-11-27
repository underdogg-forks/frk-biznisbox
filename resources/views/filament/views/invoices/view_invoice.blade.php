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

                    {{-- TODO: Start SplitButton Filament equivalent --}} shareInvoice(NEEDS_CONVERSION},
                            {
                                label: __("basic.send"),
                                icon: 'fa fa-paper-plane',
                                command: () => sendInvoiceNotification(NEEDS_CONVERSION},
                            { label: __("basic.download"), icon: 'fa fa-download', command: downloadInvoice },
                            { label: __("basic.show_pdf"), icon: 'fa fa-file-pdf', command: viewInvoicePdf },
                            {
                                label: __("basic.audit_log"),
                                icon: 'fa fa-history',
                                command: () => (showAuditLogDialog = true),
                            },
                        ]"
                    />