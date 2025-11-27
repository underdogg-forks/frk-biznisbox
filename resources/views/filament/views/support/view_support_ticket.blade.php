{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

{{-- TODO: Start DefaultLayout Filament equivalent --}}
        {{-- TODO: Start LoadingScreen Filament equivalent --}}
            {{-- TODO: Start PageHeader Filament equivalent --}}
                <template #actions>
                    {{-- TODO: Convert Button to Filament equivalent --}}
                    {{-- TODO: Convert Button to Filament equivalent --}}
                    {{-- TODO: Start SplitButton Filament equivalent --}} markSupportTicketAsResolved(),
                            },
                            { label: __("support.mark_as_closed"), icon: 'fa fa-times', command: () => markSupportTicketAsClosed() },
                            {
                                label: __("basic.send"),
                                icon: 'fa fa-paper-plane',
                                command: () => sendTicketNotificationToContact(supportTicket.id),
                            },
                        ]"
                    />

                    {{-- TODO: Convert Button to Filament equivalent --}}