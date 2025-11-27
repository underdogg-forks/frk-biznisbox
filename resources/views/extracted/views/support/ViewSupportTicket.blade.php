{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="$t('support.view_ticket')">
                <template #actions>
                    <Button
                        id="delete_button"
                        :label="$t('basic.delete')"
                        icon="fa fa-trash"
                        severity="danger"
                        @click="deleteSupportTicketAsk(supportTicket.id)"
                    />
                    <Button
                        id="share_ticket_button"
                        :label="$t('basic.share')"
                        icon="fa fa-share"
                        @click="shareSupportTicket(supportTicket.id)"
                    />
                    <SplitButton
                        v-if="supportTicket.status !== 'closed' && supportTicket.status !== 'resolved'"
                        id="more_options_button"
                        :label="$t('support.mark_as_resolved')"
                        icon="fa fa-check"
                        severity="secondary"
                        :model="[
                            {
                                label: $t('support.mark_as_resolved'),
                                icon: 'fa fa-check',
                                command: () => markSupportTicketAsResolved(),
                            },
                            { label: $t('support.mark_as_closed'), icon: 'fa fa-times', command: () => markSupportTicketAsClosed() },
                            {
                                label: $t('basic.send'),
                                icon: 'fa fa-paper-plane',
                                command: () => sendTicketNotificationToContact(supportTicket.id),
                            },
                        ]"
                        @click="markSupportTicketAsResolved"
                    />

                    <Button
                        v-if="supportTicket.status === 'closed' || supportTicket.status === 'resolved'"
                        id="reopen_button"
                        :label="$t('support.reopen_ticket')"
                        icon="fa fa-undo"
                        @click="markSupportTicketAsReopened"
                    />