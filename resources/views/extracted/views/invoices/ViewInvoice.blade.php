{{-- This blade file was auto-generated from a Vue component --}}
{{-- Vue-specific directives and syntax need to be converted to Blade/HTML --}}
{{-- Components like DefaultLayout, PageHeader, etc. need to be created as Blade components --}}

<DefaultLayout>
        <LoadingScreen :blocked="loadingData">
            <PageHeader :title="invoice.number">
                <template #actions>
                    <Button
                        v-if="invoice.status != 'paid' && invoice.status != 'overpaid' && invoice.status != 'refunded'"
                        id="edit_invoice_button"
                        :label="$t('basic.edit')"
                        icon="fa fa-pen"
                        severity="success"
                        @click="$router.push(`/invoices/${$route.params.id}/edit`)"
                    />
                    <Button
                        v-if="invoice.status != 'paid' && invoice.status != 'overpaid' && invoice.status != 'refunded'"
                        id="delete_invoice_button"
                        :label="$t('basic.delete')"
                        icon="fa fa-trash"
                        severity="danger"
                        @click="deleteInvoiceAsk($route.params.id)"
                    />
                    <Button
                        v-if="invoice.status != 'paid' && invoice.status != 'overpaid' && invoice.status != 'refunded'"
                        id="add_payment_button"
                        :label="$t('invoice.add_payment')"
                        icon="fa fa-plus"
                        @click="addTransactionDialog = true"
                    />

                    <SplitButton
                        id="more_options_button"
                        :label="$t('invoice.show_transactions')"
                        icon="fa fa-list"
                        :model="[
                            { label: $t('basic.share'), icon: 'fa fa-share', command: () => shareInvoice($route.params.id) },
                            {
                                label: $t('basic.send'),
                                icon: 'fa fa-paper-plane',
                                command: () => sendInvoiceNotification($route.params.id),
                            },
                            { label: $t('basic.download'), icon: 'fa fa-download', command: downloadInvoice },
                            { label: $t('basic.show_pdf'), icon: 'fa fa-file-pdf', command: viewInvoicePdf },
                            {
                                label: $t('basic.audit_log'),
                                icon: 'fa fa-history',
                                command: () => (showAuditLogDialog = true),
                            },
                        ]"
                        @click="showTransactionsDialog = true"
                    />